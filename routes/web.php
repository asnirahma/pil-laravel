<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('about', function () {
    return view('about');
});

Route::get('mahasiswa', function () {
    $NIM = [0702223164, 0702223160, 0702221042, 0702221045];
    $Nama = ['ASNI', 'RANSU', 'BUJE', 'CITRA'];
    $jumlah = count($NIM);
    return view('mahasiswa', compact('NIM', 'jumlah', 'Nama'));
});


Route::get('profile', function () {
    $nama = 'Asni';
    // return view('profile',compact('nama'));
    return view('profile')->with('nama', $nama);
});
