<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PersonController::class, 'index']);
Route::post('/', [PersonController::class, 'create']);
Route::get('/{id}', [PersonController::class, 'read']);
Route::put('/{id}', [PersonController::class, 'update']);
Route::delete('/{id}', [PersonController::class, 'delete']);
