<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuuserController extends Controller
{
   public function index() {
    return view('user2.buku.halaman-buku');
   }
}
