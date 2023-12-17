<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create(){
        return view('category.tambah');
    }

    public function store(Request $request){
        //validasi
        $request->validate([
            'name' => 'required|min:4'
        ]);

        //insert data di form ke database kategori
        DB::table('categories')->insert([
            'name'=> $request->input('name')
        ]);

        //Pindahkan ke halaman /categories
        return redirect('/category');
    }

    public function index(){
        $category= DB::table('categories')->get();

        return view('category.tampilkategori', ['category'=>$category]);
    }

    public function edit($id){
        $categoryData= DB::table('categories')->find($id);

        return view('category.edit', ['categoryData'=>$categoryData]);
    }

    public function update($id, Request $request){
        //validasi
        $request->validate([
            'name' => 'required|min:4'
        ]);

        //Update Kategori by Id
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name'=> $request->input('name')
            ]);
        
        //Redirect ke Halaman Kategori
        return redirect('/category');
    }

    public function destroy($id){
        DB::table('categories')->where('id', '=', $id)->delete();

        return redirect('/category');
    }
}
