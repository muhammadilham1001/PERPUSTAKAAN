<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\genre;
use App\Models\penerbit;
use App\Models\pengarang;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kolom = 'genre';
            $keyword = $request->search;
            $genre = buku::whereHas('genre', function($query) use ($keyword) {
                $query->where('genre', 'LIKE', '%'.$keyword.'%');
            })->orWhere('pengarang','LIKE','%' .$keyword.'%')->orWhere('penerbit','LIKE','%' .$keyword.'%')->orWhere('judul','LIKE','%' .$keyword.'%')->paginate(3);
            $genre->appends(['search', $keyword]);
            return view('buku.halaman-buku', ['buku' => $genre]);
            
        }
         $buku = buku::with('genre')->paginate(3);

        return view('buku.halaman-buku', compact('buku'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = genre::all();
        return view('buku.tambah-buku', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'judul' => 'required|min:5|max:50',
            'tahun_terbit' => 'required|',
            'gambar' => 'required|max:3072|mimes:jpeg,jpg,png,',
        ],[
            'judul.required' => 'Bidang judul wajib diisi.',
            'judul.min' => 'Minimal harus 5 karakter',
            'judul.max' => 'Maximal harus 50 karakter',
            'pengarang.required' => 'Bidang pengarang wajib diisi.',
            'penerbit.required' => 'Bidang penerbit wajib diisi.',
            'tahun_terbit.required' => 'Bidang tahun terbit wajib diisi.',
            'gambar.required' => 'Bidang gambar wajib diisi.',
            'gambar.max' => 'ukuran gambar maksimal 3Mb',
            'gambar.mimes' => 'Yang anda masukan bukan ekstensi jpeg,jpg,png',

        ]
    );


        $nm = $request->gambar;
        $namaFile = $nm->hashName();

        $dtUpload = new buku;
        $dtUpload->judul = $request->judul;
        $dtUpload->pengarang = $request->pengarang;
        $dtUpload->penerbit = $request->penerbit;
        $dtUpload->genre_id = $request->genre_id;
        $dtUpload->tahun_terbit = $request->tahun_terbit;
        $dtUpload->gambar = $namaFile;

        $nm->move(public_path().'/template/img', $namaFile);
        $dtUpload->save();
        $jumlahNotifikasi = Buku::where('created_at', '>', Carbon::now()->subDays(7))->count();

        return redirect('halaman-buku')->with('success', 'Data Berhasil Tersimpan!')->with('jumlahNotifikasi', $jumlahNotifikasi);

        session()->flash('success', 'Data buku berhasil ditambahkan!');


      return redirect('halaman-buku')->with('success', 'Data Berhasil Tersimpan!');
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
    public function edit($id)
    {
        $genre = genre::all();
        $edit = buku::with('genre')->findorfail($id);
        return view('buku.edit-buku',compact('edit','genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $this->validate($request,[
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'judul' => 'required|min:5|max:50',
            'tahun_terbit' => 'required|',
            'gambar' => 'max:3072|mimes:jpeg,jpg,png,',
        ],[
            'judul.required' => 'Bidang judul wajib diisi.',
            'judul.min' => 'Minimal harus 5 karakter',
            'judul.max' => 'Maximal harus 50 karakter',
            'pengarang.required' => 'Bidang pengarang wajib diisi.',
            'penerbit.required' => 'Bidang penerbit wajib diisi.',
            'tahun_terbit.required' => 'Bidang tahun terbit wajib diisi.',
            'gambar.max' => 'ukuran gambar maksimal 3Mb',
            'gambar.mimes' => 'Yang anda masukan bukan ekstensi jpeg,jpg,png',

        ]
    );

        $ubah = buku::findorfail($id);
        $awal = $ubah->gambar;

        if ($request->hasFile('gambar')) {
            if (File::exists(public_path(). '/template/img/'.$awal)) {
                File::delete(public_path().'/template/img/'.$awal);
                
                $awal = $request->gambar->hashName();
                $request->gambar->move(public_path().'/template/img', $awal); 
            }
        }
        $edit = [
            'judul' => $request['judul'],
            'pengarang' => $request['pengarang'],
            'penerbit' => $request['penerbit'],
            'genre_id' => $request['genre_id'],
            'tahun_terbit' => $request['tahun_terbit'],
            'gambar' => $awal,
        ];
        $ubah->update($edit);
            
        return redirect('halaman-buku')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
 public function destroy($id)
{
    $hapus = buku::findorfail($id);

    $count_penerbit = penerbit::where('penerbit_id', $id)->count();
    $count_pengarang = pengarang::where('pengarang_id', $id)->count();

    if ($count_penerbit > 0 || $count_pengarang > 0) {
        return back()->with('error', 'Data masih digunakan di tabel Penerbit atau Pengarang!');
    }

    $file = public_path('/template/img/').$hapus->gambar;
    if (file_exists($file)) {
        @unlink($file);
    }

    $hapus->delete();

    $lastPage = ceil(buku::count() / 3);

    if (request()->input('page') == $lastPage && buku::count() % 3 == 1) {
        return redirect()->route('halaman-buku')->with('success', 'Data berhasil dihapus!')->with('page', 1);
    } else {
        return redirect()->route('halaman-buku')->with('success', 'Data berhasil dihapus!');
    }
}

}
