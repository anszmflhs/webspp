<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BayarSekarangController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
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
Route::post('/login-user', [AuthController::class, 'loginUser']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logoutUser', [AuthController::class, 'logoutUser'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/siswas', [SiswaController::class, 'index']);
});

Route::get('/siswas', [SiswaController::class, 'indexs']);


Route::get('/bayarsekarangs', [BayarSekarangController::class, 'indexs'])->middleware('auth:sanctum');
Route::post('/bayarsekarangs', [BayarSekarangController::class, 'creates']);

Route::get('/kelass', [KelasController::class, 'index']);
Route::get('/spps', [SppController::class, 'index']);
