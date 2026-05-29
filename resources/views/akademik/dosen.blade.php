@extends('layouts.main')
@section('title', 'Daftar Dosen')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Daftar Dosen Jurusan TI</h2>
                <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
            <hr>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dosens as $index => $dosen)
                        <tr>
                            <td>
                                @if (
                                    $dosens instanceof \Illuminate\Pagination\LengthAwarePaginator ||
                                        $dosens instanceof \Illuminate\Pagination\Paginator)
                                    {{ ($dosens->currentPage() - 1) * $dosens->perPage() + $loop->iteration }}
                                @else
                                    {{ $loop->iteration }}
                                @endif
                            </td>
                            <td>{{ $dosen->nidn }}</td>
                            <td>{{ $dosen->nama_lengkap }}</td>
                            <td>{{ $dosen->email }}</td>
                            <td>{{ $dosen->prodi }}</td>
                            <td>{{ $dosen->alamat }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data dosen</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <p>Showing {{ $dosens->firstItem() }} to {{ $dosens->lastItem() }} of {{ $dosens->total() }} results</p>

            {{ $dosens->links() }}

        </div>
    </div>
@endsection
