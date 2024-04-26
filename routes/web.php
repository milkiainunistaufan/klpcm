<?php

use App\Models\Dpjp;
use App\Models\klpcm;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlpcmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardDpjpController;
use App\Http\Controllers\DashboardCetakController;
use App\Http\Controllers\DashboardRuangController;
use App\Http\Controllers\DasboardKlpcmbpjsController;
use App\Http\Controllers\DashboardKlpcmumumController;
use App\Http\Controllers\DashboardLaporanklpcmController;
use App\Http\Controllers\DashboardPengembalianController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboards', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/klpcmumums', DashboardKlpcmumumController::class)->middleware('auth');
Route::post('dashboard/klpcmumums/carabayar/{id}', function( $id){
    klpcm::where('id', $id)->update(['cara_bayar' => 'bpjs']);
    return redirect('/dashboard/klpcmumums')->with('success', 'Data berhasil diubah ke data BPJS');
});

Route::resource('/dashboard/klpcmbpjs', DasboardKlpcmbpjsController::class)->middleware('auth');
Route::post('dashboard/klpcmbpjs/carabayar/{id}', function( $id){
    klpcm::where('id', $id)->update(['cara_bayar' => 'umum']);
    return redirect('/dashboard/klpcmbpjs')->with('success', 'Data berhasil diubah ke data Umum');
});

Route::get('/dashboard/laporanklpcm', [DashboardLaporanklpcmController::class, 'index'])->middleware('auth');
Route::get('/dashboard/laporanklpcm/cetaklaporan', [DashboardLaporanklpcmController::class, 'cetakLaporan'])->middleware('auth');


Route::resource('/dashboard/pengembalian', DashboardPengembalianController::class)->middleware('auth');
Route::get('/dashboard/pengembalian/kembali/{id}', function($id){
    Pengembalian::where('id', $id)->update(['status' => '1']);
    return redirect('/dashboard/pengembalian')->with('success','status diperbarui RM telah kembali');
});
Route::get('/dashboard/pengembalian/belum/{id}', function($id){
    Pengembalian::where('id', $id)->update(['status' => '2']);
    return redirect('/dashboard/pengembalian')->with('success','status diperbarui RM telah kembali');
});

Route::resource('/dashboard/dpjp', DashboardDpjpController::class)->middleware('auth');
Route::resource('/dashboard/ruang', DashboardRuangController::class)->middleware('auth');

Route::get('/dashboard/pengembalians/cetak', [DashboardCetakController::class, 'pengembalian'])->middleware('auth');
Route::get('/dashboard/klpcmumum/cetak', [DashboardKlpcmumumController::class, 'cetak'])->middleware('auth');
Route::get('/dashboard/klpcmbpjss/cetak', [DasboardKlpcmbpjsController::class, 'cetak'])->middleware('auth');