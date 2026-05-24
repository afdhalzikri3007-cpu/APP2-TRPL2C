$project = Get-Location
$unused = Join-Path $project 'unused_files'
if(!(Test-Path $unused)) { New-Item -ItemType Directory -Path $unused }

# Identify duplicate files by MD5
$hashTable = @{}
Get-ChildItem -Path $project -Recurse -File | ForEach-Object {
    $hash = (Get-FileHash -Path $_.FullName -Algorithm MD5).Hash
    if($hashTable.ContainsKey($hash)){
        $hashTable[$hash] += $_
    } else {
        $hashTable[$hash] = @($_)
    }
}
$duplicateFiles = $hashTable.GetEnumerator() | Where-Object { $_.Value.Count -gt 1 } | ForEach-Object { $_.Value | Select-Object -Skip 1 }
foreach($file in $duplicateFiles){
    $rel = $file.FullName.Substring($project.Path.Length+1)
    $dest = Join-Path $unused $rel
    $destDir = Split-Path $dest -Parent
    if(!(Test-Path $destDir)){ New-Item -ItemType Directory -Path $destDir -Force }
    Move-Item -Path $file.FullName -Destination $dest -Force
}

# Find unreferenced Blade files
$bladeFiles = Get-ChildItem -Path .\resources\views -Recurse -Filter *.blade.php
$referenced = @()
$searchPaths = @('.\app', '.\routes', '.\resources\views')
foreach($path in $searchPaths){
    Get-ChildItem -Path $path -Recurse -Include *.php, *.blade.php -File | ForEach-Object {
        $content = Get-Content $_.FullName -Raw
        foreach($bf in $bladeFiles){
            $basename = [IO.Path]::GetFileNameWithoutExtension($bf.Name)
            if($content -match "\\b$basename\\b"){ $referenced += $bf.FullName }
        }
    }
}
$referenced = $referenced | Select-Object -Unique
$unusedBlade = $bladeFiles | Where-Object { $referenced -notcontains $_.FullName }
foreach($file in $unusedBlade){
    $rel = $file.FullName.Substring($project.Path.Length+1)
    $dest = Join-Path $unused $rel
    $destDir = Split-Path $dest -Parent
    if(!(Test-Path $destDir)){ New-Item -ItemType Directory -Path $destDir -Force }
    Move-Item -Path $file.FullName -Destination $dest -Force
}

# Write report
$report = "Duplicate files moved: $($duplicateFiles.Count)`nUnreferenced blade files moved: $($unusedBlade.Count)"
Set-Content -Path cleanup_report.md -Value $report
