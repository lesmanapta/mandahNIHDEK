<?php

use App\Models\Login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoutersController;
use GuzzleHttp\Middleware;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Models\Routers;

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
})-> middleware('auth');

Route::get('/tambahpaketbaru', function () {
    return view('tambahpaketbaru');
})-> middleware('auth');


//ini udah pegang hanya super admin yang bisa
Route::get('/pengaturanadmin', [UserController::class, 'index'])->name('pengaturanadmin')-> middleware('auth', 'superadmin');

// Login Admin Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Add Admin Routes
Route::get('/tambahadmin', [AdminController::class, 'create'])->name('tambahadmin')-> middleware('auth');;
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store')-> middleware('auth');;

// Logout Routes
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/listKontak', [CustomersController::class, 'index'])->name('listKontak')-> middleware('auth');;

Route::get('/tambahkontakbaru', [CustomersController::class, 'create'])->name('tambahkontakbaru')-> middleware('auth');;
Route::post('/tambahkontakbaru', [CustomersController::class, 'store'])->name('tambahkontakbaru.store')-> middleware('auth');;
// Update-Delete Admin Routes

// Route::get('/admin/{id}', 'AdminController@editAdmin')->name('admin.edit');
// Route::put('/admin/{id}', 'AdminController@updateAdmin')->name('admin.update');


Route::get('/editadmin/{id}', [AdminController::class, 'edit'])->name('editadmin')-> middleware('auth');
Route::put('/updateadmin/{id}', [AdminController::class, 'update'])->name('updateadmin')-> middleware('auth');
Route::get('/deleteadmin/{id}', [AdminController::class, 'destroy'])->name('deleteadmin')-> middleware('auth');

Route::get('/edittambahkontak/{id}', [CustomersController::class, 'edit'])->name('editKontak')-> middleware('auth');;
Route::put('/updateKontak/{id}', [CustomersController::class, 'update'])->name('updateKontak')-> middleware('auth');;
Route::get('/hapusKontak/{id}', [CustomersController::class, 'destroy'])->name('hapusKontak')-> middleware('auth');;

// Route::middleware(['superadmin'])->group(function () {
//     // Routes that only Super Admin can access
//     Route::get('/pengaturanadmin', [AdminController::class, 'pengaturanadmin'])->name('pengaturanadmin');
// });
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

Route::get('/ippool', function () {
    return view('ippool');
});

Route::get('/tambahippool', function () {
    return view('tambahippool');
});

// Route::get('/pengaturanadmin', function () {
//     return view('pengaturanadmin');
// });

// Route::get('/tambahadmin', function () {
//     return view('tambahadmin');
// });

// Route::get('/loginv2', function () {
//     return view('loginv2');
// });

// menampilkan list router
Route::get('/router', [RoutersController::class, 'index'])->name('router');

//add routers
Route::get('/tambahrouter', [RoutersController::class, 'create'])->name('tambahrouter');
Route::post('/store', [RoutersController::class, 'store'])->name('router.store');

//crud routers
Route::get('/editrouter/{id}', [RoutersController::class, 'edit'])->name('editrouter')-> middleware('auth');
Route::put('/updaterouter/{id}', [RoutersController::class, 'update'])->name('updaterouter')-> middleware('auth');
Route::get('/deleterouter/{id}', [RoutersController::class, 'destroy'])->name('deleterouter')-> middleware('auth');