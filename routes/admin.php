<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DivisiController;
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
	// Divisi
	Route::get('/admin/divisi', [DivisiController::class, 'index']);
	Route::get('/admin/divisi/create', [DivisiController::class, 'create']);
	Route::post('/admin/divisi/store', [DivisiController::class, 'store']);
	Route::get('/admin/divisi/edit/{id}', [DivisiController::class, 'edit']);
	Route::put('/admin/divisi/update/{id}', [DivisiController::class, 'update']);
	Route::delete('/admin/divisi/destroy/{id}', [DivisiController::class, 'destroy']);

});