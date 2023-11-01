<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;

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

// Roles
Route::get('/admin/role', [RoleController::class, 'index']);
Route::post('/admin/role/store', [RoleController::class, 'store']);
Route::put('/admin/role/{id}', [RoleController::class, 'update']);
Route::delete('/admin/role/{id}', [RoleController::class, 'destroy']);

