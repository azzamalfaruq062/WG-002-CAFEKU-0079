<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'owner'])->group(function () {//grouping midleware untuk owner yg bisa akses route didalamnya hanya yg terpenui middleware owner
    Route::resource('user', UserController::class);//route resource dari user controller
    Route::get('deletuser/{id}', [UserController::class, 'destroy'])->name('deletuser');//route dari user controller destroy function
});

Route::middleware('auth')->group(function () {//grouping midleware untuk menu & kategori harus login untuk akses
    Route::resource('kategori', KategoriController::class);//route resource dari kategori controller
    Route::get('deletkategori/{kategori}', [KategoriController::class, 'destroy'])->name('deletkategori');//route dari kategori controller destroy function
    
    Route::resource('menu', MenuController::class);//route resource dari menu controller
    Route::get('deletmenu/{menu}', [MenuController::class, 'destroy'])->name('deletmenu');//route dari menu controller destroy function
});

Route::get('/', [MenuController::class, 'depan'])->name('/');//route dari menu controller, depan function. untuk menampilkan semua menu di depan

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');//route untuk menampilkan halaman dashboard sebelum di inputkan
Route::post('/hitung', [DashboardController::class, 'dashboard'])->name('hitung');//route untuk menampilkan hasil dari inputan orders pada dashboard
