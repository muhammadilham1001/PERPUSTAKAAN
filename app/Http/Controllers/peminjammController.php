<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\buku;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjammController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{ 
    if ($request->has('search')) {
        $keyword = $request->search;
        $buku = Peminjam::with('buku')
            ->whereHas('buku', function($query) use ($keyword) {
                $query->where('judul', 'LIKE', '%'.$keyword.'%');
            })
            ->orWhere('nama', 'LIKE', '%' . $request->search . '%')
            ->where('status', 'dipinjam') 
            ->paginate(4);
    } else {
        $buku = Peminjam::where('status', 'dipinjam')->paginate(4); 
    }
    return view('peminjam.halaman-peminjam', compact('buku'));
}



public function history(Request $request)
{ 
    if ($request->has('search')) {
        $keyword = $request->search;
        $buku = Peminjam::with('buku')
            ->whereHas('buku', function($query) use ($keyword) {
                $query->where('judul', 'LIKE', '%'.$keyword.'%');
            })
            ->orWhere('nama', 'LIKE', '%' . $request->search . '%')
            ->where('status', 'selesai')
            ->paginate(4);
    } else {
        $buku = Peminjam::where('status', 'selesai')->paginate(4); 
    }
    return view('peminjam.history-peminjam', compact('buku'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = buku::all();
        return view('peminjam.tambah-peminjam', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|regex:/^[a-zA-Z\s]*$/',
            'jenis_kelamin' => 'required',
            'wa' => 'required',
            'alamat' => 'required|',
            'tanggal_pinjam' => 'required',
            'tanggal_pengembalian' => 'required',
        ],[
            'nama.required' => 'Nama Peminjam wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin peminjam wajib diisi.',
            'wa.required' => 'Nomor wa peminjam wajib diisi.',
            'alamat.required' => 'Alamat peminjam wajib diisi.',
            'tanggal_pinjam.required' => 'Tanggal Peminjaman wajib diisi.',
            'tanggal_pengembalian.required' => 'Tanggal Pengembalian wajib diisi.'

        ]
    );


        $dtUpload = new Peminjam();
        $dtUpload->nama = $request->nama;
        $dtUpload->status = 'dipinjam'; 
        $dtUpload->jenis_kelamin = $request->jenis_kelamin;
        $dtUpload->wa = $request->wa;
        $dtUpload->alamat = $request->alamat;
        $dtUpload->buku_id = $request->buku_id;
        $dtUpload->tanggal_pinjam = $request->tanggal_pinjam;
        $dtUpload->tanggal_pengembalian = $request->tanggal_pengembalian;
        $dtUpload->save();
        $jumlahNotifikasi = Peminjam::where('created_at', '>', Carbon::now()->subDays(7))->count();

        return redirect('halaman-peminjam')->with('success', 'Data Berhasil Tersimpan!')->with('jumlahNotifikasi', $jumlahNotifikasi);

        session()->flash('success', 'Data Peminjam berhasil ditambahkan!');


      return redirect('halaman-peminjam')->with('success', 'Data Berhasil Tersimpan!');
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
        $edit = Peminjam::with('buku')->findorfail($id);
        return view('peminjam.edit-peminjam',compact('edit','buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'nama' => 'required|regex:/^[a-zA-Z\s]*$/',
            'jenis_kelamin' => 'required',
            'wa' => 'required',
            'alamat' => 'required|',
            'tanggal_pinjam' => 'required',
            'tanggal_pengembalian' => 'required',
        ],[
            'nama.required' => 'Nama Peminjam wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin peminjam wajib diisi.',
            'wa.required' => 'Nomor wa peminjam wajib diisi.',
            'alamat.required' => 'Alamat peminjam wajib diisi.',
            'tanggal_pinjam.required' => 'Tanggal Peminjaman wajib diisi.',
            'tanggal_pengembalian.required' => 'Tanggal Pengembalian wajib diisi.'

        ]
    );

        $ubah = Peminjam::findorfail($id);

        $edit = [
            'nama' => $request['nama'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'wa' => $request['wa'],
            'alamat' => $request['alamat'],
            'buku_id' => $request['buku_id'],
            'tanggal_pinjam' => $request['tanggal_pinjam'],
            'tanggal_pengembalian' => $request['tanggal_pengembalian'],
        ];
        $ubah->update($edit);
            
        return redirect('halaman-peminjam')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function done(Request $request, $id)
    {
        $ubah = Peminjam::findorfail($id);

        $edit = [
            'status' => 'selesai'
        ];
        $ubah->update($edit);
            
        return redirect('halaman-peminjam')->with('success', 'Peminjam Berhasil mengembalikan buku');
    }

public function destroy(string $id)
{
    $hapus = Peminjam::findorfail($id);
    $hapus->delete();

    return back()->with('success', 'Data berhasil dihapus!');
}

}
