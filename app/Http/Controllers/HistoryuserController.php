<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryuserController extends Controller
{
public function index() {
    return view('user2.history.history');
   }
}
