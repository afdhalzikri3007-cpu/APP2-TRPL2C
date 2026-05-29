@extends('layouts.main')
@section('title', 'Daftar Ruangan')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Ruangan Jurusan TI</h2>
            <a href="{{ route('ruangan.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Gedung</th>
                        <th>Lantai</th>
                        <th>Kapasitas</th>
                        <th>Keterangan</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ruangans as $index => $ruangan)
                    <tr>
                        <td>{{ $ruangans->firstItem() + $index }}</td>
                        <td>{{ $ruangan->kode_ruangan }}</td>
                        <td>{{ $ruangan->nama_ruangan }}</td>
                        <td>{{ $ruangan->gedung }}</td>
                        <td>{{ $ruangan->lantai }}</td>
                        <td>{{ $ruangan->kapasitas }} orang</td>
                        <td>{{ $ruangan->keterangan ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('ruangan.edit', $ruangan) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('ruangan.destroy', $ruangan) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ruangan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data ruangan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($ruangans->total() > 0)
            <p>Menampilkan {{ $ruangans->firstItem() }} sampai {{ $ruangans->lastItem() }} dari {{ $ruangans->total() }} data</p>
        @endif

        {{ $ruangans->links() }}
    </div>
</div>
@endsection
