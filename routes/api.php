<?php

use App\Http\Controllers\AccpesanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PesananController;
use App\Models\Mobile\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

///////////////////////
// ROUTE API LAYANAN //
///////////////////////
Route::get('/layananapi', [DashboardController::class, 'layananapi']);
Route::post('/satulayanan', [DashboardController::class, 'satulayanan']);

//////////////////////
// ROUTE API BERITA //
//////////////////////
Route::get('/beritaapi', [DashboardController::class, 'beritaapi']);

////////////////////////
// ROUTE API CUSTOMER //
////////////////////////
Route::post('/registerc', [CustomerController::class, 'store']);
Route::post('/loginc', [CustomerController::class, 'login']);
Route::post('/updatec', [CustomerController::class, 'update']);
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/logoutc', [CustomerController::class, 'logout']);
Route::post('/satucustomer', [CustomerController::class, 'customer']);

/////////////////////
// ROUTE API MITRA //
/////////////////////
Route::post('/registerm', [MitraController::class, 'store']);
Route::post('/loginm', [MitraController::class, 'login']);
Route::post('/updatem', [MitraController::class, 'update']);
Route::get('/mitra', [MitraController::class, 'index']);
Route::get('/logoutm', [MitraController::class, 'logout']);

////////////////////////////
// ROUTE API LOKASI MITRA //
////////////////////////////
Route::post('/updatelokasi', [MitraController::class, 'updatelokasi']);
Route::post('/updatestatus', [MitraController::class, 'updatestatus']);
Route::get('/lokasim', [MitraController::class, 'index']);

/////////////////////////
// ROUTE API TRANSAKSI //
/////////////////////////
Route::post('/tambahpesan', [PesananController::class, 'store']);
Route::get('/hapuspesan', [PesananController::class, 'destroy']);
Route::post('/pesanbaru', [PesananController::class, 'index']);
Route::post('/pesanterdekat', [PesananController::class, 'terdekat']);
Route::get('/semuapesan', [PesananController::class, 'semua']);

/////////////////////////////
// ROUTE API TRANSAKSI ACC //
/////////////////////////////
Route::post('/prosespesan', [AccpesanController::class, 'store']);
Route::get('/selesaipesan', [AccpesanController::class, 'destroy']);
Route::post('/pesankini', [AccpesanController::class, 'index']);

///////////////////////
// ROUTE API HISTORY //
///////////////////////
Route::post('/tambahhistory', [HistoryController::class, 'store']);
