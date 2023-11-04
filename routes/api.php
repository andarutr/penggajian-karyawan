<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\GajiController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\DivisiController;
use App\Http\Controllers\Api\Admin\JabatanController;
use App\Http\Controllers\Api\Admin\AccountController;
use App\Http\Controllers\Api\Karyawan\AbsensiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Roles
Route::get('/admin/role', [RoleController::class, 'index']);
Route::post('/admin/role/store', [RoleController::class, 'store']);
Route::put('/admin/role/{id}', [RoleController::class, 'update']);
Route::delete('/admin/role/{id}', [RoleController::class, 'destroy']);

// Divisi
Route::get('/admin/divisi', [DivisiController::class, 'index']);
Route::post('/admin/divisi/store', [DivisiController::class, 'store']);
Route::put('/admin/divisi/{id}', [DivisiController::class, 'update']);
Route::delete('/admin/divisi/{id}', [DivisiController::class, 'destroy']);

// Jabatan
Route::get('/admin/jabatan', [JabatanController::class, 'index']);
Route::post('/admin/jabatan/store', [JabatanController::class, 'store']);
Route::put('/admin/jabatan/{id}', [JabatanController::class, 'update']);
Route::delete('/admin/jabatan/{id}', [JabatanController::class, 'destroy']);

// Account
Route::get('/admin/account', [AccountController::class, 'index']);
Route::post('/admin/account/store', [AccountController::class, 'store']);
Route::put('/admin/account/{id}', [AccountController::class, 'update']);
Route::delete('/admin/account/{id}', [AccountController::class, 'destroy']);

// Gajian
Route::post('/admin/gaji/store', [GajiController::class, 'store']);
Route::put('/admin/gaji/{id}', [GajiController::class, 'update']);
Route::delete('/admin/gaji/{id}', [GajiController::class, 'destroy']);

// Absensi Karyawan
Route::post('/karyawan/absensi/store', [AbsensiController::class, 'store']);
