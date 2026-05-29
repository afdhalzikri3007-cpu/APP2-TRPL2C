@extends('layouts.main')
@section('title', 'Data Prodi')

@section('content')
    <h1>Daftar Jurusan {{ $data[0] }} prodi {{ $data[1] }}</h1>
    <hr>
    <div class="row g-4">

        <div class="col-lg-4">
            <div class="card h-100" style="width: 100%;">
                <img src="/images/logoti-hitam.png" class="card-img-top" alt="Logo Prodi"
                    style="height: 220px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Prodi Manajemen Informatika</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Sequi nihil voluptate vero harum soluta
                        reiciendis.</p>
                    <a href="#" class="btn btn-primary mt-auto">more</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100" style="width: 100%;">
                <img src="/images/logoti-hitam.png" class="card-img-top" alt="Logo Prodi"
                    style="height: 220px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Prodi Teknik Komputer</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Sequi nihil voluptate vero harum soluta
                        reiciendis.</p>
                    <a href="#" class="btn btn-primary mt-auto">more</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100" style="width: 100%;">
                <img src="/images/logoti-hitam.png" class="card-img-top" alt="Logo Prodi"
                    style="height: 220px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Prodi Teknologi Rekayasa Perangkat Lunak</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Sequi nihil voluptate vero harum soluta
                        reiciendis.</p>
                    <a href="#" class="btn btn-primary mt-auto">more</a>
                </div>
            </div>
        </div>

    </div>
@endsection
