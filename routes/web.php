<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CongthucController;
use App\Http\Controllers\Admin\DonviController;
use App\Http\Controllers\Admin\KhainiemController;
use App\Http\Controllers\Admin\LoaidonviController;
use App\Http\Controllers\Admin\MonController;
use App\Http\Controllers\Admin\HangsoController;
use App\Http\Controllers\Admin\LoaipheptoanController;
use App\Http\Controllers\Admin\BieuthucController;

use App\Http\Controllers\Admin\ChuyendonviController;
use App\Http\Controllers\Admin\DonvicuakhainiemController;
use App\Http\Controllers\Admin\CongthuccuamonController;
use App\Http\Controllers\ChitietcongthucController;

use App\Http\Controllers\Admin\HinhcuacongthucController;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/chitietcongthuc/{id}', [ChitietcongthucController::class, 'chitietcongthuc'])->name('chitietcongthuc');
Route::post('/chitietcongthuc/{id}', [ChitietcongthucController::class, 'tinhcongthuc']);
Route::get('/chitietkhainiem/{id}', [ChitietkhainiemController::class, 'chitietkhainiem'])->name('chitietkhainiem');
Route::get('/admin', [KhainiemController::class, 'index'])->name('admin');
Route::get('dodai', [HomeController::class, 'dodai'])->name('dodai');
Route::post('/dodai', [HomeController::class, 'doidodai']);
Route::get('thetich', [HomeController::class, 'thetich'])->name('thetich');
Route::post('/thetich', [HomeController::class, 'doithetich']);
Route::get('khoiluong', [HomeController::class, 'khoiluong'])->name('khoiluong');
Route::post('/khoiluong', [HomeController::class, 'doikhoiluong']);
Route::get('phuongtrinhbachai', [HomeController::class, 'phuongtrinhbachai'])->name('phuongtrinhbachai');
Route::post('phuongtrinhbachai', [HomeController::class, 'tinhphuongtrinhbachai']);
Route::get('phuongtrinhbacnhat', [HomeController::class, 'phuongtrinhbacnhat'])->name('phuongtrinhbacnhat');
Route::post('phuongtrinhbacnhat', [HomeController::class, 'tinhphuongtrinhbacnhat']);


Route::prefix('/admin')->name('admin.')->group(function () {

    Route::resource('congthuc', CongthucController::class);
    Route::resource('donvi', DonviController::class);
    Route::resource('khainiem', KhainiemController::class);
    Route::resource('loaidonvi', LoaidonviController::class);
    Route::resource('mon', MonController::class);
    Route::resource('hangso', HangsoController::class);
    // Route::resource('loaipheptoan', LoaipheptoanController::class);
    Route::resource('bieuthuc', BieuthucController::class);
    Route::resource('chuyendonvi', ChuyendonviController::class);
    Route::resource('donvicuakhainiem', DonvicuakhainiemController::class);
    Route::resource('congthuccuamon', CongthuccuamonController::class);
    Route::resource('hinhcuacongthuc', HinhcuacongthucController::class);
});
