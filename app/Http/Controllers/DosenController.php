<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::latest()->paginate(5);
        return view('akademik.dosen', ['dosens' => $dosens]);
    }

    public function create()
    {
        return view('akademik.dosen_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn'         => 'required|unique:dosens,nidn|max:10',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir'    => 'required|date',
            'email'        => 'required|email|unique:dosens,email',
            'prodi'        => 'required|string|max:255',
            'alamat'       => 'required|string',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan!');
    }

    public function show(Dosen $dosen)
    {
        //
    }

    public function edit(Dosen $dosen)
    {
        return view('akademik.dosen_edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nidn'         => 'required|max:10|unique:dosens,nidn,' . $dosen->id,
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir'    => 'required|date',
            'email'        => 'required|email|unique:dosens,email,' . $dosen->id,
            'prodi'        => 'required|string|max:255',
            'alamat'       => 'required|string',
        ]);

        $dosen->update($validated);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil diperbarui!');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus!');
    }
}
