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
                return redirect('admindash');
                }
                if (Auth::user()->level=='petugas')
                return redirect('petugasdash');
        }

    }
    
}
