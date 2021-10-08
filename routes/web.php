<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Models\Layanan;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/servis', [DashboardController::class, 'layanan']);
Route::get('/kontak', function () {
    return view('kontak');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blog-single', function () {
    return view('blog-single');
});

Route::prefix('login')->group(function() {
    Route::post('/', [LoginController::class, 'store'])->name('login');
});

Route::middleware(['auth','cekrole:karyawan'])->prefix('karyawan')->group(function(){
    Route::get('');
});

Route::middleware(['auth','cekrole:admin'])->prefix('karyawan')->group(function(){
    Route::get('');
});
