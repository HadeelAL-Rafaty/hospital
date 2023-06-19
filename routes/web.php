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
    return view('welcome');
});

Route::get('appointment', function () {
    return view('appointment');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('doctors', function () {
    return view('doctors');
});

Route::get('index', function () {
    return view('index');
});

Route::get('loginpage', function () {
    return view('loginpage');
});

Route::get('signup', function () {
    return view('signup');
});