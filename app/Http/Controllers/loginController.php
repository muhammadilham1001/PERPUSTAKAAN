<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\PasswordReset;

class loginController extends Controller
{
    public function login(){
        
        return view('login');
    }

    public function loginUser(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email','password'))) {
            $user = Auth::user()->name;
           return redirect('/')->with('toast_success', 'Selamat datang, ' . $user . '!');
        }
        return redirect('login')->with('error', 'password atau email anda salah!');
    }

    public function register(){
        return view('register');
    }

    public function registerUser(Request $request){
        $this->validate($request,[
            'email' => 'email|unique:users,email',
        ],[
            'email.unique' => 'email sudah terdaftar, coba cari yang lain!'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
       ]);

       return redirect('/login')->with('success', 'Anda berhasil melakukan register!');
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with('success', 'Anda telah logout!');
    }
    
    public function reset(){
        return view('reset-password');
    }

    public function resetUser(Request $request){
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
        ],[
            'konfirmasi_password.same' => 'konfirmasi password tidak sama'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        $user->password = bcrypt($request->password);
        $user->setRememberToken(Str::random(60));
        $user->save();

        event(new PasswordReset($user));

        return redirect('/login')->with('success', 'Password anda berhasil direset');
    
    }
}
