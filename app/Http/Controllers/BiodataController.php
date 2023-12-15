<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function daftar(){
        return view('page.register');
    }

    public function home(Request $request){
        $namaDepan = $request->input('fname');
        $namaBelakang = $request->input('lname');

        return view('page.home', ['namaDepan'=>$namaDepan, 'namaBelakang'=>$namaBelakang]);
    }
}
