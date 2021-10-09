<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Models\Layanan;

////////////////////////
// ROUTE WEB OFFICIAL //
////////////////////////
Route::get('/', function () {
    return view('welcome');
})->name('/');
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
Route::get('/join', function () {
    return view('join');
});

/////////////////
// ROUTE LOGIN //
/////////////////
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::prefix('login/proses')->group(function() {
    Route::post('/', [LoginController::class, 'store'])->name('loginproses');
});

//////////////////////////
// ROUTE UNTUK KARYAWAN //
//////////////////////////
Route::middleware(['auth','cekrole:karyawan'])->prefix('karyawan')->group(function(){
    Route::get('');
});

///////////////////////
// ROUTE UNTUK ADMIN //
///////////////////////
Route::middleware(['auth','cekrole:admin'])->prefix('admin')->group(function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('main.dashboard');
    
    // ROUTE UNTUK TABEL AWAL
    Route::get('karyawan', [AdminController::class, 'karyawan'])->name('karyawan');
    Route::get('listjob', [AdminController::class, 'listjob'])->name('listjob');
    Route::get('job', [AdminController::class, 'job'])->name('job');
    Route::get('jabatan', [AdminController::class, 'jabatan'])->name('jabatan');
    Route::get('blog', [AdminController::class, 'blog'])->name('blog');
    Route::get('layanan', [AdminController::class, 'layanan'])->name('layanan');
    Route::get('admin', [AdminController::class, 'admin'])->name('admin');

    // ROUTE UNTUK FORM TAMBAH DATA
    Route::get('karyawan/tambah', [AdminController::class, 'tambahkaryawan'])->name('tambahkaryawan');
    Route::get('listjob/tambah', [AdminController::class, 'tambahlistjob'])->name('tambahlistjob');
    Route::get('job/tambah', [AdminController::class, 'tambahjob'])->name('tambahjob');
    Route::get('jabatan/tambah', [AdminController::class, 'tambahjabatan'])->name('tambahjabatan');
    Route::get('blog/tambah', [AdminController::class, 'tambahblog'])->name('tambahblog');
    Route::get('layanan/tambah', [AdminController::class, 'tambahlayanan'])->name('tambahlayanan');
    Route::get('admin/tambah', [AdminController::class, 'tambahadmin'])->name('tambahadmin');

    // ROUTE UNTUK STORE TAMBAH DATA
    Route::post('karyawan/store', [AdminController::class, 'storekaryawan'])->name('storekaryawan');
    Route::post('listjob/store', [AdminController::class, 'storelistjob'])->name('storelistjob');
    Route::post('job/store', [AdminController::class, 'storejob'])->name('storejob');
    Route::post('jabatan/store', [AdminController::class, 'storejabatan'])->name('storejabatan');
    Route::post('blog/store', [AdminController::class, 'storeblog'])->name('storeblog');
    Route::post('layanan/store', [AdminController::class, 'storelayanan'])->name('storelayanan');
    Route::post('admin/store', [AdminController::class, 'storeadmin'])->name('storeadmin');

    // ROUTE UNTUK FORM EDIT DATA
    Route::get('karyawan/edit/{id}', [AdminController::class, 'editkaryawan'])->name('editkaryawan');
    Route::get('listjob/edit/{id}', [AdminController::class, 'editlistjob'])->name('editlistjob');
    Route::get('job/edit/{id}', [AdminController::class, 'editjob'])->name('editjob');
    Route::get('jabatan/edit/{id}', [AdminController::class, 'editjabatan'])->name('editjabatan');
    Route::get('blog/edit/{id}', [AdminController::class, 'editblog'])->name('editblog');
    Route::get('layanan/edit/{id}', [AdminController::class, 'editlayanan'])->name('editlayanan');
    Route::get('admin/edit/{id}', [AdminController::class, 'editadmin'])->name('editadmin');

    // ROUTE UNTUK UPDATE EDIT DATA
    Route::post('karyawan/update', [AdminController::class, 'updatekaryawan'])->name('updatekaryawan');
    Route::post('listjob/update', [AdminController::class, 'updatelistjob'])->name('updatelistjob');
    Route::post('job/update', [AdminController::class, 'updatejob'])->name('updatejob');
    Route::post('jabatan/update', [AdminController::class, 'updatejabatan'])->name('updatejabatan');
    Route::post('blog/update', [AdminController::class, 'updateblog'])->name('updateblog');
    Route::post('layanan/update', [AdminController::class, 'updatelayanan'])->name('updatelayanan');
    Route::post('admin/update', [AdminController::class, 'updateadmin'])->name('updateadmin');

    // ROUTE UNTUK HAPUS DATA
    Route::get('karyawan/hapus/{id}', [AdminController::class, 'hapuskaryawan'])->name('hapuskaryawan');
    Route::get('listjob/hapus/{id}', [AdminController::class, 'hapuslistjob'])->name('hapuslistjob');
    Route::get('job/hapus/{id}', [AdminController::class, 'hapusjob'])->name('hapusjob');
    Route::get('jabatan/hapus/{id}', [AdminController::class, 'hapusjabatan'])->name('hapusjabatan');
    Route::get('blog/hapus/{id}', [AdminController::class, 'hapusblog'])->name('hapusblog');
    Route::get('layanan/hapus/{id}', [AdminController::class, 'hapuslayanan'])->name('hapuslayanan');
    Route::get('admin/hapus/{id}', [AdminController::class, 'hapusadmin'])->name('hapusadmin');
});

//////////////////////////
// ROUTE UNTUK ALL ROLE //
//////////////////////////
Route::middleware(['auth','cekrole:karyawan,admin'])->prefix('karyawan')->group(function(){
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});