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
    return redirect(\route('stats'));
});

Route::get('/stats', function () {
    return view('stats');
})->name('stats');

Route::get('/inventory', function () {
    return view('inventory');
})->name('inventory');

Route::get('/data', function () {
    return view('data');
})->name('data');

Route::get('/map', function () {
    return view('map');
})->name('map');

Route::get('/radio', function () {
    return view('radio');
})->name('radio');
