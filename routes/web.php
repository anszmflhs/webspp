<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BayarSekarangController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login.view')->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.post');
Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register.view');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('register.post');

Route::prefix('admin')->group(function () {
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    // Route::middleware('role:admin')->get('/admin', function(){
    //     return redirect('/admin');
    // });
    Route::post('/', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
})->middleware('auth:admin');

Route::prefix('petugas')->group(function () {
    Route::get('/create', [PetugasController::class, 'create'])->name('petugas.create');
    Route::get('/', [PetugasController::class, 'index'])->name('petugas.index');
    Route::post('/', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::post('/{id}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
});

Route::prefix('siswa')->group(function () {
    Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});
Route::prefix('kelas')->group(function () {
    Route::get('/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('/', [KelasController::class, 'store'])->name('kelas.store');
    // Route::get('/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    // Route::post('/{id}', [KelasController::class, 'update'])->name('kelas.update');
    // Route::delete('/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::prefix('permintaan')->group(function () {
    Route::get('/create', [PermintaanController::class, 'create'])->name('permintaan.create');
    Route::get('/', [PermintaanController::class, 'index'])->name('permintaan.index');
    Route::post('/', [PermintaanController::class, 'store'])->name('permintaan.store');
    Route::get('/{id}', [PermintaanController::class, 'edit'])->name('permintaan.edit');
    Route::post('/{id}', [PermintaanController::class, 'update'])->name('permintaan.update');
    Route::delete('/{id}', [PermintaanController::class, 'destroy'])->name('permintaan.destroy');
});
Route::prefix('bayarsekarang')->group(function () {
    Route::get('/create', [BayarSekarangController::class, 'create'])->name('bayarsekarang.create');
    Route::get('/', [BayarSekarangController::class, 'index'])->name('bayarsekarang.index');
    Route::post('/', [BayarSekarangController::class, 'store'])->name('bayarsekarang.store');
    Route::delete('/{id}', [BayarSekarangController::class, 'destroy'])->name('bayarsekarang.destroy');
});
