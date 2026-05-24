@extends('layouts.main')
@section('title','Tambah Mahasiswa')
@section('navMhs','active')

@section('content')

<h1>Form Tambah Mahasiswa</h1>

<form method="POST" action="/mahasiswa">
    @csrf
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value={{ old('nim') }}>
        @error('nim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value={{ old('nama_lengkap') }}>
        @error('nama_lengkap')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value={{ old('tempat_lahir') }}>
        @error('tempat_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value={{ old('tgl_lahir') }}>
        @error('tgl_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value={{ old('email') }}>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="prodi" class="form-label">Prodi</label>
        <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" value={{ old('prodi') }}>
        @error('prodi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control @error('alamat') is-invalid @enderror" value={{ old('alamat') }}></textarea>
        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Data yang diisi merupakan data valid</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/mahasiswa" class="btn btn-secondary">
        Kembali
    </a>
</form>

@endsection
