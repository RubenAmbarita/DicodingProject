<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonasiBukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//get method 

Route::get('/', [LoginController::class, 'index']);
Route::get('/test', [DashboardController::class, 'utama']);
Route::get('/signup', [BiodataController::class, 'daftar']);

Route::get('/donasi-buku', function(){
    return view('page.donasi-buku');
});

Route::get('/cari-buku', function(){
    return view('page.cari-buku');
});

Route::post('/home', [BiodataController::class, 'home']);


Route::group(['middleware'=>['auth']], function(){
    //CRUD Kategori Buku
    //Buat Data Kategori
    
    Route::get('/category/create', [CategoryController::class, 'create']);
    
    //Simpan Data Kategori
    Route::post('/category', [CategoryController::class, 'store']);

    //Read Data Kategori
    Route::get('/category', [CategoryController::class, 'index']);

    //Update Data Kategori
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);

    //Hapus Data Kategori
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    //CRUD Donasi Buku
    Route::resource('donasibuku', DonasiBukuController::class);
});

Auth::routes();

