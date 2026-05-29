@extends('layouts.main')
@section('title', 'Tambah Data Prodi')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Data Prodi</h4>
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

                <form action="/data-prodi" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="kode_prodi" class="form-label">Kode Prodi</label>
                        <input type="text" class="form-control" id="kode_prodi" name="kode_prodi"
                            value="{{ old('kode_prodi') }}" placeholder="Contoh: TRPL" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Nama Prodi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                            value="{{ old('nama_prodi') }}"
                            placeholder="Contoh: Teknologi Rekayasa Perangkat Lunak" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenjang" class="form-label">Jenjang</label>
                        <select class="form-select" id="jenjang" name="jenjang" required>
                            <option value="">-- Pilih Jenjang --</option>
                            <option value="D3" {{ old('jenjang') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ old('jenjang') == 'D4' ? 'selected' : '' }}>D4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="akreditasi" class="form-label">Akreditasi</label>
                        <input type="text" class="form-control" id="akreditasi" name="akreditasi"
                            value="{{ old('akreditasi') }}" placeholder="Contoh: Baik Sekali">
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"
                            rows="3">{{ old('keterangan') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="/data-prodi" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
