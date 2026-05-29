@extends('layouts.main')
@section('title', 'Edit Data Prodi')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-4">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Edit Data Prodi</h4>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/data-prodi/{{ $prodi->id }}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="kode_prodi" class="form-label">Kode Prodi</label>
                        <input type="text" class="form-control" id="kode_prodi" name="kode_prodi"
                            value="{{ old('kode_prodi', $prodi->kode_prodi) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Nama Prodi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                            value="{{ old('nama_prodi', $prodi->nama_prodi) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenjang" class="form-label">Jenjang</label>
                        <select class="form-select" id="jenjang" name="jenjang" required>
                            <option value="D3" {{ old('jenjang', $prodi->jenjang) == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ old('jenjang', $prodi->jenjang) == 'D4' ? 'selected' : '' }}>D4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="akreditasi" class="form-label">Akreditasi</label>
                        <input type="text" class="form-control" id="akreditasi" name="akreditasi"
                            value="{{ old('akreditasi', $prodi->akreditasi) }}">
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"
                            rows="3">{{ old('keterangan', $prodi->keterangan) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="/data-prodi" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
