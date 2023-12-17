<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Donasi;

class DonasiBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donasi = Donasi::all();

        return view('donasi.tampil', ['donasi'=>$donasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('donasi.tambah', ['category'=>$category]);

        $user_id = User::all();

        return view('donasi.tambah', ['user_id'=>$user_id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaBuku'=>'required',
            'pengarang'=>'required',
            'category_id'=>'required',
            'jumlahBuku'=>'required|integer',
            'fotoBuku'=>'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time().'.'.$request->fotoBuku->extension();  

        $request->fotoBuku->move(public_path('images'), $imageName);

        $donasi = new Donasi;
        $donasi->namaBuku = $request->input('namaBuku');
        $donasi->pengarang = $request->input('pengarang');
        $donasi->category_id = $request->input('category_id');
        $donasi->jumlahBuku = $request->input('jumlahBuku');
        $donasi->fotoBuku = $imageName;

        $donasi->save();

        return redirect('/donasibuku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
