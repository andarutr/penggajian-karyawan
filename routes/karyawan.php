<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Karyawan\DashboardController;

Route::middleware('isKaryawan')->group(function(){
	Route::get('/karyawan', DashboardController::class);
});