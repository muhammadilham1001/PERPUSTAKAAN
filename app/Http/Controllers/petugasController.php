<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $users = User::where('name','LIKE','%' .$request->search.'%')->paginate(4);
        }else {
            $users = User::paginate(4);
        }
        return view('petugas.halaman-petugas', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = User::findorfail($id);

        $hapus->delete();
        $lastPage = ceil(User::count() / 4);
       if (request()->input('page') == $lastPage && User::count() % 4 == 1) {
        return redirect()->route('halaman-petugas')->with('success', 'Data berhasil dihapus!')->with('page', 1);
    } else {
        return redirect()->route('halaman-petugas')->with('success', 'Data berhasil dihapus!');
    }
    }
}
