<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index (){
        return view ('login');
    }
    public function poslog (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $info = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($info)){
            $request -> session() -> regenerate();
            // return redirect()-> intended('/');
            if (Auth::user()->level=='admin'){
                return redirect('admindash')->with('loginberhasil', 'Login berhasil!!');
                }
                if (Auth::user()->level=='petugas')
                return redirect('petugasdash')->with('loginberhasil', 'Login berhasil!!');
        }
        else{
            return redirect('/login')->with('loginError', 'Login gagal!, silahkan cek email atau password anda ');
        }

    }
    
}
