<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuanganController;

Route::get('/', function () {
    return view('home');
});

// Route::get('/profil', function () {
//     return view('profil');
// });

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/greeting-home', function () {
    return 'Home';
});

Route::get('/perulangan', function () {
    $nama = 'Bill Gates';
    $nim = '2022180001';
    $total_nilai = [80, 70, 20];
    return view('akademik.perulangan', compact('nama','nim','total_nilai'));
});

// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa-show', [MahasiswaController::class, 'show']);

Route::get('/tambah-mahasiswa', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

// Route::get('/insert-sql', [MahasiswaController::class, 'insertSql']);
// Route::get('/insert-prepared', [MahasiswaController::class, 'insertPrepared']);
// Route::get('/insert-binding', [MahasiswaController::class, 'insertBinding']);
// Route::get('/update', [MahasiswaController::class, 'update']);
// Route::get('/delete', [MahasiswaController::class, 'delete']);
// Route::get('/select', [MahasiswaController::class, 'select']);
// Route::get('/select-tampil', [MahasiswaController::class, 'selectTampil']);
// Route::get('/select-view', [MahasiswaController::class, 'selectView']);
// Route::get('/select-where', [MahasiswaController::class, 'selectWhere']);
// Route::get('/statement', [MahasiswaController::class, 'statement']);


// Mahasiswa Module 10
Route::get('/cek-objek', [MahasiswaController::class, 'cekObjek']);
Route::get('/insert', [MahasiswaController::class, 'insert']);
Route::get('/mass-assignment', [MahasiswaController::class, 'massAssignment']);

Route::get('/update', [MahasiswaController::class, 'updateTest']);
Route::get('/update-where', [MahasiswaController::class, 'updateWhere']);
Route::get('/mass-update', [MahasiswaController::class, 'massUpdate']);

Route::get('/delete', [MahasiswaController::class, 'delete']);
Route::get('/destroy', [MahasiswaController::class, 'destroyTest']);
Route::get('/mass-delete', [MahasiswaController::class, 'massDelete']);

Route::get('/all', [MahasiswaController::class, 'all']);
Route::get('/all-view', [MahasiswaController::class, 'allView']);
Route::get('/get-where', [MahasiswaController::class, 'getWhere']);
Route::get('/test-where', [MahasiswaController::class, 'testWhere']);
Route::get('/first', [MahasiswaController::class, 'first']);
Route::get('/find', [MahasiswaController::class, 'find']);
Route::get('/latest', [MahasiswaController::class, 'latest']);
Route::get('/limit', [MahasiswaController::class, 'limit']);
Route::get('/skip-take', [MahasiswaController::class, 'skipTake']);

Route::get('/soft-delete', [MahasiswaController::class, 'softDelete']);
Route::get('/with-trashed', [MahasiswaController::class, 'withTrashed']);
Route::get('/restore', [MahasiswaController::class, 'restore']);
Route::get('/force-delete', [MahasiswaController::class, 'forceDelete']);

Route::resource('dosen', DosenController::class);
Route::resource('ruangan', RuanganController::class);
Route::get('/prodi', function () {
    $data = ['Teknik Informatika', 'Manajemen Informatika'];
    return view('akademik.prodi', compact('data'));
});
// Route::get('/mahasiswa', function () {
//     $nama = 'Taylor Otwell';
//     $nim = '2022180001';
//     $total_nilai = 82;
//     return view('akademik.nilai_mahasiswa', compact('nama','nim','total_nilai'));
// });

//Membuat Route
Route::get('/profil',function () {
    echo '<h1>Profil</h1>';
    return '<p>Jurusan Teknologi Unformasi-Politeknik Negeri Padang</p>';
});

Route::get('/mahasiswa/ti/udin', function () {
    echo "<p style = 'font-size:40;color:orange'>Jurusan Teknologi Informasi";
    echo '<h1>Selamat datang udin...</h1>';
    echo '<hr>';
    echo '<p>lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.</p>';
});

// Route parameter
Route::get('/mahasiswa/ti/{nama}', function ($nama) {
    return '<p> Ketua HIMA Jurusan TI adalah <b>'.$nama.'</b></p>';
});

// 2 atau lebih route parameter
Route::get('/mahasiswa/ti/{nama}/{nim}', function ($nama,$nim) {
    return '<p> Ketua HIMA TI adalah <b>'.$nama.'<b/> dengan NIM = '.$nim.'</p>';
});

// Optional Parameter
Route::get('/dosen/{nama?}/{nip?}', function($a='admin',$b='2022000001'){
    return '<p> Dosen Pembina HIMA TI adalah <b>'.$a.'</b> dengan NIP = '.$b.'</p>';
});

// Regular Expression
Route::get('/user/{id}', function($id) {
    return '<p> User Admin memiliki id <b>'.$id.'</b></p>';
})->where('id', '[0-9]+');

//Route Redirect
Route::get('/buku-tamu', function () {
    return '<h2> Buku Tamu </h2>';
});
Route::redirect('/guest-book', '/buku-tamu');

//Route Group

Route::prefix('/login')->group(Function() {
    Route::get('/mahasiswa', function (){
        return '<h2> Login Mahasiswa </h2>';
    });
    Route::get('/dosen', function (){
        return '<h2> Login Dosen </h2>';
    });
    Route::get('/admin', function () {
        return '<h2> Login Admin </h2>';
    });
});

//Route Fallback
Route::fallback(function () {
    return '<h2> Halaman tidak ditemukan</h2>';
});



//Daftar Route
//dilihat di cmd dengan perintah php artisan route:list
