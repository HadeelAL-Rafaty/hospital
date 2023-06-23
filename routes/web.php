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
Auth::routes();







Route::get('admin/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth','isAdmin'])->group (function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);



    //Doctor Route
    Route::get('doctor',[App\Http\Controllers\Admin\DoctorController::class,'index']);
    Route::get('doctor/create',[App\Http\Controllers\Admin\DoctorController::class,'create']);
    Route::post('doctor',[App\Http\Controllers\Admin\DoctorController::class,'store']);

   //Department Route

    Route::get('department',[App\Http\Controllers\Admin\DepartmentController::class,'index']);
    Route::get('department/create',[App\Http\Controllers\Admin\DepartmentController::class,'create']);
    Route::post('department',[App\Http\Controllers\Admin\DepartmentController::class,'store']);



});
