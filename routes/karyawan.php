<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Karyawan\DashboardController;
use App\Http\Controllers\Settings\ChangePasswordController;

Route::middleware('isKaryawan')->group(function(){
	Route::get('/karyawan', DashboardController::class);
	Route::get('/karyawan/settings/change-password', [ChangePasswordController::class, 'index']);
	Route::post('/karyawan/settings/change-password', [ChangePasswordController::class, 'update']);
});