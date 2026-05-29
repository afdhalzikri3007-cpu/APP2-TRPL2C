<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::latest()->paginate(5);

        return view('akademik.ruangan', compact('ruangans'));
    }

    public function create()
    {
        return view('akademik.ruangan_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_ruangan' => ['required', 'string', 'max:20', 'unique:ruangan,kode_ruangan'],
            'nama_ruangan' => ['required', 'string', 'max:150'],
            'gedung' => ['required', 'string', 'max:50'],
            'lantai' => ['required', 'integer', 'min:1', 'max:100'],
            'kapasitas' => ['required', 'integer', 'min:1', 'max:10000'],
            'keterangan' => ['nullable', 'string'],
        ]);

        Ruangan::create($validated);

        return redirect()->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil ditambahkan!');
    }

    public function edit(Ruangan $ruangan)
    {
        return view('akademik.ruangan_edit', compact('ruangan'));
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $validated = $request->validate([
            'kode_ruangan' => [
                'required',
                'string',
                'max:20',
                Rule::unique('ruangan', 'kode_ruangan')->ignore($ruangan->id),
            ],
            'nama_ruangan' => ['required', 'string', 'max:150'],
            'gedung' => ['required', 'string', 'max:50'],
            'lantai' => ['required', 'integer', 'min:1', 'max:100'],
            'kapasitas' => ['required', 'integer', 'min:1', 'max:10000'],
            'keterangan' => ['nullable', 'string'],
        ]);

        $ruangan->update($validated);

        return redirect()->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil diperbarui!');
    }

    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();

        return redirect()->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil dihapus!');
    }
}
