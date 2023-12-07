<?php

use App\Models\Login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/tambahpaketbaru', function () {
    return view('tambahpaketbaru');
});

Route::get('/pengaturanadmin', [UserController::class, 'index'])->name('pengaturanadmin');

// Login Admin Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Add Admin Routes
Route::get('/tambahadmin', [AdminController::class, 'create'])->name('tambahadmin');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');

// Logout Routes
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Update-Delete Admin Routes

Route::get('/editadmin/{id}', 'AdminController@editAdmin')->name('editadmin');
Route::post('/updateadmin/{id}', 'AdminController@updateAdmin')->name('updateadmin');
Route::get('/deleteadmin/{id}', 'AdminController@deleteAdmin')->name('deleteadmin');


// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
// Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route::get('/tambahadmin', [AdminController::class, 'create'])->name('admin.create');
// Route::post('/tambahadmin', [AdminController::class, 'store'])->name('admin.store');
// Route::post('/tambahadmin', [AdminController::class, 'tambahadmin'])->name('tambahadmin');

// Route::get('/master', function () {
//     return view('master');
// });
// Route::get('/tambahkontakbaru', function () {
//     return view('tambahkontakbaru');
// });

// Route::get('/beranda', function () {
//     return view('beranda');
// });


// Route::get('/listKontak', function () {
//     return view('ListKontak');
// });

// Route::get('/laporankeuangan', function () {
//     return view('laporankeuangan');
// });

// Route::get('/tambahpaketbaru', function () {
//     return view('tambahpaketbaru');
// });

// Route::get('/paketpppoe', function () {
//     return view('paketpppoe');
// });

// Route::get('/pakethotspot', function () {
//     return view('pakethotspot');
// });

// Route::get('/router', function () {
//     return view('router');
// });

// Route::get('/tambahrouter', function () {
//     return view('tambahrouter');
// });

// Route::get('/ippool', function () {
//     return view('ippool');
// });

// Route::get('/tambahippool', function () {
//     return view('tambahippool');
// });

// Route::get('/pengaturanadmin', function () {
//     return view('pengaturanadmin');
// });

// Route::get('/tambahadmin', function () {
//     return view('tambahadmin');
// });

// Route::get('/loginv2', function () {
//     return view('loginv2');
// });





