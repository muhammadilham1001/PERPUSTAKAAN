<?php

namespace App\Http\Controllers;
use App\Models\buku;
use App\Models\anggota;
use App\Models\penerbit;
use App\Models\pengarang;
use App\Models\User;
use App\Models\genre;
use App\Models\Peminjam;

use Illuminate\Http\Request;

class Dashboard2Controller extends Controller
{
        public function index(){
        $jumlah_buku = buku::all()->count();
        $jumlah_anggota = anggota::all()->count();
        $jumlah_penerbit = penerbit::all()->count();
        $jumlah_pengarang = pengarang::all()->count();
        $jumlah_petugas = User::where('role','user')->count();
        $jumlah_peminjam = Peminjam::all()->count();
        $jumlah_genre = genre::all()->count();
        return view('user2.dashboard', compact('jumlah_buku', 'jumlah_anggota', 'jumlah_penerbit', 'jumlah_pengarang','jumlah_petugas', 'jumlah_genre','jumlah_peminjam'));
    }
}
