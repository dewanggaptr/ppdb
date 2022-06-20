<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//User Route
Route::get('home', [HomeController::class, 'index'])->name('home');

//Admin Route
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('role');

Route::resource('pendaftar', PendaftarController::class);

Route::get('/pendaftar/cetak_formulir/{user_id}', [PendaftarController::class, 'cetak_formulir'])->name('cetak_formulir');