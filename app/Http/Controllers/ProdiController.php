<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::latest()->paginate(5);

        return view('akademik.prodi_data', compact('prodis'));
    }

    public function create()
    {
        return view('akademik.prodi_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_prodi' => ['required', 'unique:prodis,kode_prodi', 'max:10'],
            'nama_prodi' => ['required', 'max:150'],
            'jenjang' => ['required', 'max:10'],
            'akreditasi' => ['nullable', 'max:30'],
            'keterangan' => ['nullable'],
        ]);

        Prodi::create($validated);

        return redirect('/data-prodi')
            ->with('success', 'Data prodi berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $prodi = Prodi::findOrFail($id);

        return view('akademik.prodi_edit', compact('prodi'));
    }

    public function update(Request $request, string $id)
    {
        $prodi = Prodi::findOrFail($id);

        $validated = $request->validate([
            'kode_prodi' => ['required', 'unique:prodis,kode_prodi,' . $prodi->id, 'max:10'],
            'nama_prodi' => ['required', 'max:150'],
            'jenjang' => ['required', 'max:10'],
            'akreditasi' => ['nullable', 'max:30'],
            'keterangan' => ['nullable'],
        ]);

        $prodi->update($validated);

        return redirect('/data-prodi')
            ->with('success', 'Data prodi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect('/data-prodi')
            ->with('success', 'Data prodi berhasil dihapus.');
    }
}
