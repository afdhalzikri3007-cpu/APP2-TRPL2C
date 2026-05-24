$proj = Get-Location
$unused = Join-Path $proj 'unused_files'
if (Test-Path $unused) {
    Get-ChildItem -Path $unused -Recurse -File | ForEach-Object {
        $relative = $_.FullName.Substring($unused.Length + 1)
        $dest = Join-Path $proj $relative
        $destDir = Split-Path $dest -Parent
        if (-not (Test-Path $destDir)) { New-Item -ItemType Directory -Path $destDir -Force }
        Move-Item -LiteralPath $_.FullName -Destination $dest -Force
    }
    Remove-Item -Path $unused -Recurse -Force
}
