<?php

use App\Http\Controllers\AccpesanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PesananController;
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
Route::get('/layananapi', [DashboardController::class,'layananapi']);

//////////////////////
// ROUTE API BERITA //
//////////////////////
Route::get('/beritaapi', [DashboardController::class,'beritaapi']);

////////////////////////
// ROUTE API CUSTOMER //
////////////////////////
Route::post('/registerc', [CustomerController::class,'register']);
Route::post('/loginc', [CustomerController::class,'login']);
Route::post('/updatec', [CustomerController::class,'update']);
Route::get('/customer', [CustomerController::class, 'customer']);
Route::get('/logoutc', [CustomerController::class, 'logout']);

/////////////////////
// ROUTE API MITRA //
/////////////////////
Route::post('/registerm', [MitraController::class,'register']);
Route::post('/loginm', [MitraController::class,'login']);
Route::post('/updatem', [MitraController::class,'update']);
Route::get('/mitra', [MitraController::class, 'mitra']);
Route::get('/logoutm', [MitraController::class, 'logout']);

/////////////////////////
// ROUTE API TRANSAKSI //
/////////////////////////
Route::post('/tambahpesan', [PesananController::class,'create']);
Route::get('/hapuspesan', [PesananController::class,'delete']);

/////////////////////////////
// ROUTE API TRANSAKSI ACC //
/////////////////////////////
Route::post('/prosespesan', [AccpesanController::class,'create']);
Route::get('/selesaipesan', [AccpesanController::class,'delete']);

///////////////////////
// ROUTE API HISTORY //
///////////////////////
Route::post('/tambahhistory');

