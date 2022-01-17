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
    return view('exercice1');
});

Route::get('/exercice2', function () {
    return view('exercice2');
});


Route::get('/function', function () {
    return view('function');
});

Route::get('/formulaire', function () {
    return view('formulaire');
});

Route::get('/poo', function () {
    return view('poo');
});
