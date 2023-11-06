<?php 

use Illuminate\Support\Facades\Route;

Route::middleware('isKaryawan')->group(function(){
	Route::get('/karyawan', function(){
		echo "INI KARYAWAN!";
	});
});