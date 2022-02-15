<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;


Route::get('/home', function(){
    return view('gentelella');

});

Route::get('/', function(){
    return view('login.index');


});

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('paket', PaketController::class);
Route::resource('outlet', OutletController::class);
Route::resource('member', MemberController::class);
Route::resource('user', UserController::class);
Route::resource('transaksi', TransaksiController::class);