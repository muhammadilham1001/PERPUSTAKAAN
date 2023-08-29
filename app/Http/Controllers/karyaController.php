<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karya_pengarang;
use App\Models\pengarang;

class karyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peng = pengarang::all();
        $dtpengarang = karya_pengarang::with('pengarang')->paginate();
        return view('karyaPengarang.halaman-karya-pengarang', compact('peng'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peng = pengarang::all();
       return view('karyaPengarang.tambah-karya-pengarang', compact('peng'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         karya_pengarang::create([
            'nama' => $request->nama,
            'karyaPengarang' => $request->karyaPengarang,
       ]);

      return redirect('halaman-karya-pengarang')->with('success', 'Data Berhasil Tersimpan!');
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
        $peng = pengarang::all();
        $pengarang =karya_pengarang::findorfail($id);
        return view('karyaPengarang.edit-karya-pengarang', compact('pengarang','peng'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = pengarang::findorfail($id);

        $pengarang = [
            'nama' => $request['nama'],
            'karya_pengarang' => $request['karya_pengarang'],
        ];

        $ubah->update($pengarang);
    
        return redirect('halaman-karya-pengarang')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
