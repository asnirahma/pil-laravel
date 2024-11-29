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
    return view('mahasiswa');
});

Route::get('profile', function () {
    $nama = 'Asni';
    // return view('profile',compact('nama'));
    return view('profile')->with('nama', $nama);
});

Route::get('array', function () {
    //Infinite Loop
    $nilai_awal = 1;
    while ($nilai_awal <= 5) {
        echo 'Hello,Nama Aku ASNI ' . $nilai_awal . ' x <br>';
        $nilai_awal++;
    }
});
