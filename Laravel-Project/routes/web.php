<?php

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

Route::get('/tambahkontakbaru', function () {
    return view('tambahkontakbaru');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/master', function () {
    return view('master');
});

Route::get('/listKontak', function () {
    return view('ListKontak');
});

Route::get('/laporankeuangan', function () {
    return view('laporankeuangan');
});

Route::get('/tambahpaketbaru', function () {
    return view('tambahpaketbaru');
});

Route::get('/paketpppoe', function () {
    return view('paketpppoe');
});

Route::get('/pakethotspot', function () {
    return view('pakethotspot');
});

Route::get('/router', function () {
    return view('router');
});

Route::get('/tambahrouter', function () {
    return view('tambahrouter');
});

Route::get('/ippool', function () {
    return view('ippool');
});

Route::get('/tambahippool', function () {
    return view('tambahippool');
});

Route::get('/pengaturanadmin', function () {
    return view('pengaturanadmin');
});

Route::get('/tambahadmin', function () {
    return view('tambahadmin');
});




