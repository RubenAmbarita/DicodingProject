<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Http\Controllers\ApproveBookController;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginUser(Request $request){
        
        $email = $request->email;
        $password = $request->passwordLogin;

        $selectDb = DB::table('user_new')
                    ->where('email', $email)
                    ->first([
                        'user_new.password',
                        'user_new.role'
                    ]);
        
        if($selectDb != NULL){
            $getPassword = $selectDb->password;
            if($password == $getPassword){
                Session::put('role', $selectDb->role);
                return redirect('approve-book');
            }else{
                return redirect('/')->with('alert', 'Password atau Email, Salah!');
            }
        }else{
            return redirect('/')->with('alert', 'Password atau Email, Salah!');
        }
    }
}