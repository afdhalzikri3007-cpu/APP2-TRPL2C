<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

use function Symfony\Component\Clock\now;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $mahasiswas = DB::table('mahasiswas')->get();
        // return view('mahasiswa.mahasiswa', compact('mahasiswas'));

        $dataMhs=Mahasiswa::latest()->paginate(5);
        return view ('mahasiswa.mahasiswa',['mahasiswas'=>$dataMhs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.mahasiswa_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =$request->validate([
            'nim'=>['required', 'unique:mahasiswas','max:10'],
            'nama_lengkap'=> ['required'],
            'tempat_lahir'=> ['required'],
            'tgl_lahir'=> ['required'],
            'email'=> ['required'],
            'prodi'=> ['required'],
            'alamat'=> ['required'],
        ]);

        Mahasiswa::create($validated);

        return redirect('/mahasiswa');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $nama = 'Bill gates';
        $nim = '20230001';
        $total_nilai = [80, 40, 90, 70];

        return view('akademik.nilai_mahasiswa')
                ->with(compact('nama', 'nim', 'total_nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.mahasiswa_edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => ['required', 'unique:mahasiswas,nim,' . $mahasiswa->id, 'max:10'],
            'nama_lengkap' => ['required'],
            'tempat_lahir' => ['required'],
            'tgl_lahir' => ['required'],
            'email' => ['required'],
            'prodi' => ['required'],
            'alamat' => ['required'],
        ]);

        $mahasiswa->update($validated);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    public function insertSql(){
        $query=DB::insert("INSERT INTO mahasiswas(nim, nama_lengkap, tempat_lahir, tgl_lahir, email, prodi, alamat, created_at, updated_at) VALUES ('2022090909', 'Linus B Torvalds', 'Finlandia', '1971-08-12', 'linus@linus.org', 'TRPL', 'Jl. Sudirman no.10 Padang', now(), now())");
    }

    public function insertPrepared(){
        $query=DB::insert("INSERT INTO mahasiswas(nim, nama_lengkap, tempat_lahir, tgl_lahir, email, prodi, alamat, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?)" ,['2411082031', 'Muhammad Irsyad Gumanof', 'Plaju', '2006-05-15', 'irsyad@irsyad.org', 'TRPL', 'Kayutanam', now(), now()]);
    }

    public function insertBinding(){
        $query=DB::insert("INSERT INTO mahasiswas(nim, nama_lengkap, tempat_lahir, tgl_lahir, email, prodi, alamat, created_at, updated_at) VALUES (:nim, :nama_lengkap, :tempat_lahir, :tgl_lahir, :email, :prodi, :alamat, :created_at, :updated_at)",
        [
            'nim'=>'2411081023',
            'nama_lengkap'=>'Silvana Yulia Damara',
            'tempat_lahir'=>'Mungka',
            'tgl_lahir'=>'2005-07-20',
            'email'=>'silvana@silvana.org',
            'prodi'=>'TRPL',
            'alamat'=>'Mungka',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }

    // public function update() {
    //     $query=DB::update("UPDATE mahasiswas SET tempat_lahir = 'Talang Maur' WHERE nama_lengkap=?",['Silvana Yulia Damara']);
    // }

    // public function delete()
    // {
    //     $query=DB::delete("DELETE FROM mahasiswas WHERE nama_lengkap=?",['Linus B Torvalds']);
    // }

    public function select()
    {
        $query=DB::select("SELECT * FROM mahasiswas");
        dd($query);
    }

    public function selectTampil()
    {
        $query=DB::select("SELECT * FROM mahasiswas");
        echo ($query[0]->id) . "<br />";
        echo ($query[0]->nim) . "<br />";
        echo ($query[0]->nama_lengkap) . "<br />";
        echo ($query[0]->email) . "<br />";
        echo ($query[0]->alamat);
    }

    public function selectView()
    {
        $query=DB::select("SELECT * FROM mahasiswas");
        return view('mahasiswa.mahasiswa',['mahasiswas'=>$query]);
    }

    public function selectWhere()
    {
        $query=DB::select("SELECT * FROM mahasiswas WHERE nim=? ORDER BY nim ASC",['2411082031']);
        return view('mahasiswa.mahasiswa',['mahasiswas'=>$query]);
    }

    public function statement()
    {
        $query=DB::statement("TRUNCATE mahasiswas");
        return ('Tabel mahasiswa sudah kosong');
    }

    public function cekObjek()
    {
        $mahasiswa=new Mahasiswa();
        dd($mahasiswa);
    }

    public function insert()
    {
        $mahasiswa=new Mahasiswa();
        $mahasiswa->nim='20210298';
        $mahasiswa->nama_lengkap='Steve job';
        $mahasiswa->tempat_lahir='Solok';
        $mahasiswa->tgl_lahir='1970-09-05';
        $mahasiswa->email='steve@apple.com';
        $mahasiswa->prodi='TRPL';
        $mahasiswa->alamat='Jl. sutomo no.11 Solok';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function massAssignment()
    {
        $mahasiswa=Mahasiswa::create(
            [
                'nim'=>'202007890',
                'nama_lengkap'=>'M. Yazid',
                'tempat_lahir'=>'Padang',
                'tgl_lahir'=>'2011-07-03',
                'email'=>'yazid@gmail.com',
                'prodi'=>'MI',
                'alamat'=>'Padang',
            ]
        );
        dump($mahasiswa);

        $mahasiswa1=Mahasiswa::create(
            [
                'nim'=>'202007891',
                'nama_lengkap'=>'M. Rasyid',
                'tempat_lahir'=>'Padang',
                'tgl_lahir'=>'2015-05-12',
                'email'=>'rasyid@gmail.com',
                'prodi'=>'TRPL',
                'alamat'=>'Padang',
            ]
        );
        dump($mahasiswa1);
    }

    public function updateTest()
    {
        $mahasiswa=Mahasiswa::find(2);

        $mahasiswa->tempat_lahir='California';
        $mahasiswa->prodi='Tekom';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function updateWhere()
    {
        $mahasiswa=Mahasiswa::where('nim','202007890')->first();
        $mahasiswa->alamat='Koto Lalang Kec. Lubuk Kilangan Padang';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function massUpdate()
    {
        $mahasiswa=Mahasiswa::where('nim','202007890')->first()->update(
            [
                'tempat_lahir'=>'Payakumbuh',
                'prodi'=>'Teknik Komputer'
            ]
        );

        dd($mahasiswa);
    }

    public function delete()
    {
        $mahasiswa=Mahasiswa::find(3);
        $mahasiswa->delete();

        dd($mahasiswa);
    }

    public function destroyTest()
    {
        $mahasiswa=Mahasiswa::destroy(3);

        dd($mahasiswa);
    }

    public function massDelete()
    {
        $mahasiswa=Mahasiswa::where('prodi','Teknik Komputer')->delete();

        dd($mahasiswa);
    }

    public function all()
    {
        $mahasiswa = Mahasiswa::all();

        foreach ($mahasiswa as $mhs) {
            echo $mhs->id . '<br>';
            echo $mhs->nim . '<br>';
            echo $mhs->nama_lengkap . '<br>';
            echo $mhs->tempat_lahir . '<br>';
            echo $mhs->alamat;
            echo '<hr>';
        }

        //dd($mahasiswa);
    }

    public function allView()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.mahasiswa', compact('mahasiswas'));
    }

    public function getWhere()
    {
        $mahasiswas = Mahasiswa::where('prodi', 'TRPL')
            ->orderBy('nama_lengkap', 'asc')
            ->get();

        return view('mahasiswa.mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function first()
    {
        $mahasiswas = Mahasiswa::where('prodi', 'TRPL')->first();
        return view('mahasiswa.mahasiswa', ['mahasiswas' => [$mahasiswas]]);
    }

    public function find()
    {
        $mahasiswas = Mahasiswa::find(6);
        return view('mahasiswa.mahasiswa', ['mahasiswas' => [$mahasiswas]]);
    }

    public function latest()
    {
        $mahasiswas = Mahasiswa::latest()->get();
        return view('mahasiswa.mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function limit()
    {
        $mahasiswas = Mahasiswa::latest()->limit(2)->get();
        return view('mahasiswa.mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function skipTake()
    {
        $mahasiswas = Mahasiswa::orderBy('id')->skip(1)->take(2)->get();
        return view('mahasiswa.mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function softDelete()
    {
        Mahasiswa::where('id', '3')->delete();
        return ('Data berhasil dihapus');
    }

    public function withTrashed()
    {
        $mahasiswas = Mahasiswa::withTrashed()->get();
        return view('mahasiswa.mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function restore()
    {
        Mahasiswa::withTrashed()->where('id', '3')->restore();
        return 'Berhasil di restore';
    }

    public function forceDelete()
    {
        Mahasiswa::where('id', '3')->forceDelete();
        return ('Data berhasil dihapus secara permanen');
    }

}
