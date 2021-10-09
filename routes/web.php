<?php

use App\Http\Controllers\AdminController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::prefix('login/proses')->group(function() {
    Route::post('/', [LoginController::class, 'store'])->name('loginproses');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth','cekrole:karyawan'])->prefix('karyawan')->group(function(){
    Route::get('');
});

Route::middleware(['auth','cekrole:admin'])->prefix('karyawan')->group(function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('main.dashboard');
});

Route::get('/join', function () {
    return view('join');
});
