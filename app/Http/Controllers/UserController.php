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

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $result = DB::table('user_new')
                    ->where('user_new.deleted_at', null)
                    ->get(['user_new.id',
                        'user_new.nama',
                        'user_new.email',
                        'user_new.password',
                        'user_new.role']);

            return datatables()->of($result)
                                ->addColumn('action', function($item){
                                    return '<div class="row text-center align-items-center">
                                                <div class="col">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc('.$item->id.')" data-original-title="Edit" class="edit btn px-0 edit">
                                                        <i class="fa fa-pen"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="javascript:void(0);" id="delete-category" onClick="#" data-toggle="tooltip" data-original-title="Delete" class="delete btn px-0">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                    ';
                                })
                                ->addIndexColumn()
                                ->make(true);
        }
        return view('user');
    }

    public function store(Request $request){
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        
        $select_email = DB::table('user_new')
                        ->where('email', $email)
                        ->first();

        
        if($select_email==NULL){
            $insert_user = DB::table('user_new')->insert([
                            'nama' => $nama,
                            'email' => $email,
                            'password' => $password,
                            'role' => $role,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
        }
                        
        return Response()->json(['success' => true]);
    }

    public function update(Request $request)
    {
        $variable = DB::table('user_new')
            ->where('id', $request->id_user)
            ->where('user_new.deleted_at', null)
            ->first([
                'user_new.id',
                'user_new.nama',
                'user_new.email',
                'user_new.password',
                'user_new.role'
            ]);

        return Response()->json($variable);
    }
}