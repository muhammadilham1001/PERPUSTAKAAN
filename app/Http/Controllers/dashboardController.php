<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\anggota;
use App\Models\penerbit;
use App\Models\pengarang;
use App\Models\User;
use App\Models\genre;
use App\Models\Peminjam;

class dashboardController extends Controller
{
    public function index(){
        $jumlah_buku = buku::all()->count();
        $jumlah_anggota = anggota::all()->count();
        $jumlah_penerbit = penerbit::all()->count();
        $jumlah_pengarang = pengarang::all()->count();
        $jumlah_petugas = User::all()->count();
        $jumlah_peminjam = Peminjam::all()->count();
        $jumlah_genre = genre::all()->count();
        return view('dashboard', compact('jumlah_buku', 'jumlah_anggota', 'jumlah_penerbit', 'jumlah_pengarang','jumlah_petugas', 'jumlah_genre','jumlah_peminjam'));
    }
    
}
