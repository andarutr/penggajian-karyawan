<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GajiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Settings\UpdateProfileController;
use App\Http\Controllers\Settings\ChangePasswordController;

Route::middleware('isAdmin')->group(function(){
	Route::get('/admin', DashboardController::class);
	// Settings
	Route::get('/admin/settings/change-password', [ChangePasswordController::class, 'index']);
	Route::post('/admin/settings/change-password', [ChangePasswordController::class, 'update']);
	Route::get('/admin/settings/profile', [UpdateProfileController::class, 'index']);
	Route::get('/admin/settings/profile/edit', [UpdateProfileController::class, 'edit']);
	Route::put('/admin/settings/profile/edit', [UpdateProfileController::class, 'update']);
	// Absensi
	Route::get('/admin/absensi', [AbsensiController::class, 'index']);
	Route::get('/admin/absensi/cari', [AbsensiController::class, 'search']);
	// Penggajian
	Route::get('/admin/penggajian', [GajiController::class, 'index']);
	Route::get('/admin/penggajian/create', [GajiController::class, 'create']);
	Route::get('/admin/penggajian/show-pdf/{id}', [GajiController::class, 'show_pdf']);
	Route::get('/admin/penggajian/download-pdf/{id}', [GajiController::class, 'download_pdf']);
	Route::post('/admin/penggajian/store', [GajiController::class, 'store']);
	Route::get('/admin/penggajian/show/{id}', [GajiController::class, 'show']);
	Route::get('/admin/penggajian/edit/{id}', [GajiController::class, 'edit']);
	Route::put('/admin/penggajian/update/{id}', [GajiController::class, 'update']);
	Route::delete('/admin/penggajian/destroy/{id}', [GajiController::class, 'destroy']);
	// Account
	Route::get('/admin/account', [AccountController::class, 'index']);
	Route::get('/admin/account/create', [AccountController::class, 'create']);
	Route::post('/admin/account/store', [AccountController::class, 'store']);
	Route::get('/admin/account/cari', [AccountController::class, 'search']);
	Route::get('/admin/account/show/{id}', [AccountController::class, 'show']);
	Route::get('/admin/account/edit/{id}', [AccountController::class, 'edit']);
	Route::put('/admin/account/update/{id}', [AccountController::class, 'update']);
	Route::delete('/admin/account/destroy/{id}', [AccountController::class, 'destroy']);
	// Divisi
	Route::get('/admin/divisi', [DivisiController::class, 'index']);
	Route::get('/admin/divisi/create', [DivisiController::class, 'create']);
	Route::post('/admin/divisi/store', [DivisiController::class, 'store']);
	Route::get('/admin/divisi/edit/{id}', [DivisiController::class, 'edit']);
	Route::put('/admin/divisi/update/{id}', [DivisiController::class, 'update']);
	Route::delete('/admin/divisi/destroy/{id}', [DivisiController::class, 'destroy']);
	// Jabatan
	Route::get('/admin/jabatan', [JabatanController::class, 'index']);
	Route::get('/admin/jabatan/create', [JabatanController::class, 'create']);
	Route::post('/admin/jabatan/store', [JabatanController::class, 'store']);
	Route::get('/admin/jabatan/edit/{id}', [JabatanController::class, 'edit']);
	Route::put('/admin/jabatan/update/{id}', [JabatanController::class, 'update']);
	Route::delete('/admin/jabatan/destroy/{id}', [JabatanController::class, 'destroy']);
	// Role
	Route::get('/admin/role', [RoleController::class, 'index']);
	Route::get('/admin/role/create', [RoleController::class, 'create']);
	Route::post('/admin/role/store', [RoleController::class, 'store']);
	Route::get('/admin/role/edit/{id}', [RoleController::class, 'edit']);
	Route::put('/admin/role/update/{id}', [RoleController::class, 'update']);
	Route::delete('/admin/role/destroy/{id}', [RoleController::class, 'destroy']);

});