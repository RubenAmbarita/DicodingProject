<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonasiBukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApproveBookController;
use App\Http\Controllers\AcceptBookController;
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
Route::get('/dashboard', [DashboardController::class, 'utama']);
Route::get('/signup', [BiodataController::class, 'daftar']);
Route::get('user', ['as' => 'user', 'uses' => 'App\Http\Controllers\UserController@index']);
Route::get('approve-book', ['as' => 'approve-book', 'uses' => 'App\Http\Controllers\ApproveBookController@index']);
Route::get('accept-book', ['as' => 'accept-book', 'uses' => 'App\Http\Controllers\AcceptBookController@index']);

Route::get('/donasi-buku', function(){
    return view('page.donasi-buku');
});

Route::get('/dashboard', function () {
    return redirect('/accept-book');
})->name('accept-book');

// Route::get('/', function () {
//         return Redirect::to('/accept-book');
//     })->name('accept-book');

Route::get('/cari-buku', function(){
    return view('page.cari-buku');
});

// login
Route::post('loginUser', [LoginController::class, 'loginUser'])->name('loginUser');
// user
Route::post('/home', [BiodataController::class, 'home']);
Route::post('store-user', [UserController::class, 'store']);
Route::post('update-user', [UserController::class, 'updateUser']);
Route::post('edit-user', [UserController::class, 'update']);
Route::post('delete-user', [UserController::class, 'destroy']);
//buku
Route::post('store-book', [ApproveBookController::class, 'store']);
Route::post('edit-approve', [ApproveBookController::class, 'update']);
Route::post('edit-accept', [AcceptBookController::class, 'update']);
Route::post('update-approve', [ApproveBookController::class, 'updateApprove']);
Route::post('update-accept', [AcceptBookController::class, 'updateAccept']);
Route::post('delete-approve', [ApproveBookController::class, 'destroy']);
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

