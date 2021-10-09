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

Route::middleware(['auth','cekrole:admin'])->prefix('admin')->group(function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('main.dashboard');
    Route::get('karyawan', [AdminController::class, 'karyawan'])->name('karyawan');
    Route::get('listjob', [AdminController::class, 'listjob'])->name('listjob');
    Route::get('job', [AdminController::class, 'job'])->name('job');
    Route::get('jabatan', [AdminController::class, 'jabatan'])->name('jabatan');
    Route::get('blog', [AdminController::class, 'blog'])->name('blog');
    Route::get('layanan', [AdminController::class, 'layanan'])->name('layanan');
    Route::get('admin', [AdminController::class, 'dashboard'])->name('dashboard');
});

Route::get('/join', function () {
    return view('join');
});
