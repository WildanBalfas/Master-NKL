<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function login(){
        return view('contents.login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/')->with(['msg'=>'Anda Berhasil Login']);
        }else{
            return redirect()->back()->withErrors(['msg'=>'Username atau Password Salah']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
