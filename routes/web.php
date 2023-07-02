<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CongthucController;
use App\Http\Controllers\Admin\DonviController;
use App\Http\Controllers\Admin\KhainiemController;
use App\Http\Controllers\Admin\LoaidonviController;
use App\Http\Controllers\Admin\MonController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::prefix('/admin')->name('admin.')->group(function () {


    Route::resource('congthuc', CongthucController::class);
    Route::resource('donvi', DonviController::class);
    Route::resource('khainiem', KhainiemController::class);
    Route::resource('loaidonvi', LoaidonviController::class);
    Route::resource('mon', MonController::class);

});
