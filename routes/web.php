<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenggunaanBarangController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SimulasiController;


Route::get('/home', function(){
    return view('gentelella');

});

Route::get('/', function(){
    return view('login.index');


});

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/imports/OutletImport', [OutletController::class, 'importData']);
Route::post('/imports/PaketImport', [PaketController::class, 'importData']);
Route::post('/imports/MemberImport', [MemberController::class, 'importData']);
Route::post('/imports/PenjemputanImport', [PenjemputanController::class, 'importData']);
Route::get('/pdf', [OutletController::class, 'exportPDF']);
Route::get('/transaksi/faktur/{faktur}',[TransaksiController::class, 'faktur']);
Route::post('/status', [PenjemputanController::class ,'status'])->name('status');
Route::post('/pstatus', [PenggunaanBarangController::class ,'status'])->name('pstatus');

Route::resource('paket', PaketController::class);
Route::resource('barang', PenggunaanBarangController::class);
Route::resource('outlet', OutletController::class);
Route::resource('member', MemberController::class);
Route::resource('user', UserController::class);
Route::resource('penjemputan', PenjemputanController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('Export/OutletExport', [OutletController::class, 'exportData']);
Route::get('Export/PaketExport', [PaketController::class, 'exportData']);
Route::get('Export/MemberExport', [MemberController::class, 'exportData']);
Route::get('Export/BarangExport', [PenggunaanBarangController::class, 'exportData']);
Route::get('Export/PenjemputExport', [PenjemputanController::class, 'exportData']);
Route::get('data_karyawan', [SimulasiController::class, 'index']);