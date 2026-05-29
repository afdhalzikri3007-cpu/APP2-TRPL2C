@extends('layouts.main')
@section('title', 'Edit Data Ruangan')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-4">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Edit Data Ruangan</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('ruangan.update', $ruangan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                        <input type="text" class="form-control @error('kode_ruangan') is-invalid @enderror"
                            id="kode_ruangan" name="kode_ruangan"
                            value="{{ old('kode_ruangan', $ruangan->kode_ruangan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror"
                            id="nama_ruangan" name="nama_ruangan"
                            value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="gedung" class="form-label">Gedung</label>
                            <input type="text" class="form-control @error('gedung') is-invalid @enderror"
                                id="gedung" name="gedung" value="{{ old('gedung', $ruangan->gedung) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="lantai" class="form-label">Lantai</label>
                            <input type="number" class="form-control @error('lantai') is-invalid @enderror"
                                id="lantai" name="lantai" value="{{ old('lantai', $ruangan->lantai) }}"
                                min="1" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="kapasitas" class="form-label">Kapasitas</label>
                            <input type="number" class="form-control @error('kapasitas') is-invalid @enderror"
                                id="kapasitas" name="kapasitas" value="{{ old('kapasitas', $ruangan->kapasitas) }}"
                                min="1" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror"
                            id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $ruangan->keterangan) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('ruangan.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
