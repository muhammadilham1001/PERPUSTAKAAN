<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\penerbit;
use Illuminate\Http\Request;

class penerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         if ($request->has('search')) {
            $kolom = 'penerbit';
            $keyword = $request->search;
            $penerbit = penerbit::whereHas('buku', function($query) use ($keyword) {
                $query->where('penerbit', 'LIKE', '%'.$keyword.'%');
            })->orWhere('alamat','LIKE','%' .$keyword.'%')->orWhere('no_telepon','LIKE','%' .$keyword.'%')->orWhere('terbitan_populer','LIKE','%' .$keyword.'%')->paginate(4);
            $penerbit->appends(['search', $keyword]);
            return view('penerbit.halaman-penerbit', ['dtpenerbit' => $penerbit]);
        }
        $dtpenerbit = penerbit::with('buku')->paginate(4);
        return view('penerbit.halaman-penerbit', compact('dtpenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $buku = buku::all();
        return view('penerbit.tambah-penerbit', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'penerbit_id' => 'unique:penerbit,penerbit_id',
            'terbitan_populer' => 'required|min:5|max:225',
            'alamat' => 'required|min:5|max:225',
            'no_telepon' => 'required|min:12|max:14|unique:penerbit,no_telepon'
        ],[

            'penerbit_id.unique' => 'penerbit sudah ditambahkan, coba edit karyanya aja',
            
            'terbitan_populer.required' => 'Bidang terbitan populer wajib diisi.',
            'terbitan_populer.min' => 'karakter harus lebih dari 5 karakter',
            'terbitan_populer.max' => 'karakter tidak boleh lebih dari 225 karakter',
             
            'alamat.required' => 'Bidang alamat wajib diisi.',
            'alamat.min' => 'karakter harus lebih dari 5 karakter',
            'alamat.max' => 'karakter tidak boleh lebih dari 225 karakter',

            'no_telepon.required' => 'Bidang telepon wajib diisi.',
            'no_telepon.min' => 'Bidang no telepon harus minimal 12 karakter.',
            'no_telepon.max' => 'Bidang no telepon harus maksimal 14 karakter.',
        ]);

        penerbit::create([
            'penerbit_id' => $request->penerbit_id,
            'terbitan_populer' => $request->terbitan_populer,
            'alamat' => $request->alamat,
            'terbitan_populer' => $request->terbitan_populer,
            'no_telepon' => $request->no_telepon,
       ]);

      return redirect('halaman-penerbit')->with('success', 'Data Berhasil Tersimpan!');
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
        $buku = buku::all();
        $edit = penerbit::with('buku')->findorfail($id);
        return view('penerbit.edit-penerbit',compact('edit', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $ubah = penerbit::findorfail($id);

        $this->validate($request,[
            
            'terbitan_populer' => 'required|min:5|max:225',
            'alamat' => 'required|min:5|max:225',
            'no_telepon' => 'required|min:12|max:14'
        ],[
            
            'nama.min' => 'karakter harus lebih dari 5 karakter',
            'nama.max' => 'karakter tidak boleh lebih dari 10 karakter',
            
            'terbitan_populer.required' => 'Bidang terbitan populer wajib diisi.',
            'terbitan_populer.min' => 'karakter harus lebih dari 5 karakter',
            'terbitan_populer.max' => 'karakter tidak boleh lebih dari 225 karakter',
             
            'alamat.required' => 'Bidang alamat wajib diisi.',
            'alamat.min' => 'karakter harus lebih dari 5 karakter',
            'alamat.max' => 'karakter tidak boleh lebih dari 225 karakter',

            'no_telepon.required' => 'Bidang telepon wajib diisi.',
            'no_telepon.min' => 'Bidang no telepon harus minimal 12 karakter.',
            'no_telepon.max' => 'Bidang no telepon harus maksimal 14 karakter.'
        ]);

        $penerbit = [
            'penerbit_id' => $request->penerbit_id,
            'terbitan_populer' => $request->terbitan_populer,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ];

        $ubah->update($penerbit);
    
        return redirect('halaman-penerbit')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = penerbit::findorfail($id);
        $hapus->delete();
        $lastPage = ceil(penerbit::count() / 4);
       if (request()->input('page') == $lastPage && penerbit::count() % 4 == 1) {
        return redirect()->route('halaman-penerbit')->with('success', 'Data berhasil dihapus!')->with('page', 1);
    } else {
        return redirect()->route('halaman-penerbit')->with('success', 'Data berhasil dihapus!');
    }
    }
}
