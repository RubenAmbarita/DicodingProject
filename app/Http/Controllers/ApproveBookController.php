<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ApproveBookController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $result = DB::table('tb_buku_donasi')
                    ->where('tb_buku_donasi.deleted_at', null)
                    ->get(['id',
                        'id_user',
                        'nama',
                        'penerbit',
                        'judul',
                        'tahun_terbit',
                        'alamat_jemput',
                        'confirmed']);

            return datatables()->of($result)
                                ->addColumn('action', function($item){
                                    return '<div class="row text-center align-items-center">
                                                <div class="col">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc('.$item->id.')" data-original-title="Edit" class="edit btn px-0 edit">
                                                        <i class="fa fa-pen"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="javascript:void(0);" id="delete-category" onClick="deleteFunc('.$item->id.')" data-toggle="tooltip" data-original-title="Delete" class="delete btn px-0">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                    ';
                                })
                                ->addIndexColumn()
                                ->make(true);
        }
        return view('approve-book');
    }

    public function store(Request $request){
        $nama_buku = $request->nama_buku;
        $judul = $request->judul;
        $penerbit = $request->penerbit;
        $tahun_terbit = $request->tahun_terbit;
        $alamat_jemput = $request->alamat_jemput;

        $insert_book = DB::table('tb_buku_donasi')->insert([
                            'id_user' => 1,
                            'nama' => $nama_buku,
                            'penerbit' => $penerbit,
                            'judul' => $judul,
                            'tahun_terbit' => $tahun_terbit,
                            'alamat_jemput' => $alamat_jemput,
                            'confirmed' => 0,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                        
        return Response()->json(['success' => true]);
    }

    public function updateApprove(Request $request){
        $id_book = $request->id_book;
        $nama = $request->nama;
        $judul = $request->judul;
        $penerbit = $request->penerbit;
        $tahun = $request->tahun;
        $alamat = $request->alamat;
              
            $updateUser = DB::table('tb_buku_donasi')
                ->where('id', $id_book)
                ->update(['nama' => $nama,
                            'judul' => $judul,
                            'penerbit' => $penerbit,
                            'tahun_terbit' => $tahun,
                            'alamat_jemput' => $alamat,
                            'updated_at' => now()
                    ]);
                        
        return Response()->json(['success' => true]);
    }

    public function update(Request $request)
    {
        $variable = DB::table('tb_buku_donasi')
            ->where('id', $request->id_approve)
            ->where('tb_buku_donasi.deleted_at', null)
            ->first([
                'tb_buku_donasi.id',
                'tb_buku_donasi.id_user',
                'tb_buku_donasi.nama',
                'tb_buku_donasi.penerbit',
                'tb_buku_donasi.judul',
                'tb_buku_donasi.tahun_terbit',
                'tb_buku_donasi.alamat_jemput'
            ]);

        return Response()->json($variable);
    }
    
    public function destroy(Request $request)
    {
        $deleted = DB::table('tb_buku_donasi')->where('id', $request->id_book)->delete();
        return Response()->json($deleted);
    }
}