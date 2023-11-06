<?php 

use Illuminate\Support\Facades\Route;

Route::middleware('isAdmin')->group(function(){
	Route::get('/admin', function(){
		echo "INI ADMIN!";
	});
});