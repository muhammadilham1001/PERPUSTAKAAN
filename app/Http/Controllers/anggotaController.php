<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        if ($request->has('search')) {

            $dtanggota = anggota::where('nama','LIKE','%' .$request->search.'%')->paginate(4);
        }else {
            $dtanggota = anggota::paginate(4);
        }
        return view('anggota.halaman-anggota', compact('dtanggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('anggota.tambah-anggota');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|regex:/^[a-zA-Z\s]*$/',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Bidang nama wajib diisi.',
            'nama.regex' => 'Format bidang nama tidak valid.',
            'jenis_kelamin.required' => 'Bidang jenis kelamin wajib diisi.',
            'usia.required' => 'Bidang usia wajib diisi.',
            'alamat.required' => 'Bidang alamat wajib diisi.',
        ]);

         anggota::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
       ]);

      return redirect('halaman-anggota')->with('success', 'Data Berhasil Tersimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = anggota::findorfail($id);
        return view('anggota.edit-anggota',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Bidang nama wajib diisi.',
            'jenis_kelamin.required' => 'Bidang jenis kelamin wajib diisi.',
            'usia.required' => 'Bidang usia wajib diisi.',
            'alamat.required' => 'Bidang alamat wajib diisi.',
        ]);

         $ubah = anggota::findorfail($id);

        $anggota = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
        ];

        $ubah->update($anggota);
    
        return redirect('halaman-anggota')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = anggota::findorfail($id);
        $hapus->delete();
        $lastPage = ceil(anggota::count() / 4);
       if (request()->input('page') == $lastPage && anggota::count() % 4 == 1) {
        return redirect()->route('halaman-anggota')->with('success', 'Data berhasil dihapus!')->with('page', 1);
    } else {
        return redirect()->route('halaman-anggota')->with('success', 'Data berhasil dihapus!');
    }
    }
}
