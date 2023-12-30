<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\GajiController;
use App\Http\Controllers\Staff\AbsensiController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Settings\UpdateProfileController;
use App\Http\Controllers\Settings\ChangePasswordController;

Route::middleware('isStaff')->group(function(){
	// Dashboard
	Route::redirect('/staff', '/staff/absensi');
	// Setting
	Route::get('/staff/settings/change-password', [ChangePasswordController::class, 'index']);
	Route::post('/staff/settings/change-password', [ChangePasswordController::class, 'update']);
	Route::get('/staff/settings/profile', [UpdateProfileController::class, 'index']);
	Route::get('/staff/settings/profile/edit', [UpdateProfileController::class, 'edit']);
	Route::put('/staff/settings/profile/edit', [UpdateProfileController::class, 'update']);
	// Absensi
	Route::get('/staff/absensi', [AbsensiController::class, 'index']);
	Route::get('/staff/absensi/create', [AbsensiController::class, 'create']);
	Route::post('/staff/absensi/store', [AbsensiController::class, 'store']);
	Route::get('/staff/rincian-gaji', [GajiController::class, 'index']);
	Route::get('/staff/rincian-gaji/cari', [GajiController::class, 'search']);
});