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

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('loginpage', function () {
    return view('loginpage');
});

Route::get('signup', function () {
    return view('signup');
});



Auth::routes();
Route::get('doctor/home1', [App\Http\Controllers\HomeController::class, 'index2'])->name('home1');
Route::prefix('doctor')->middleware(['auth','doctor'])->group (function() {});

Route::get('patient/home', [App\Http\Controllers\HomeController::class, 'index1'])->name('home');
Route::prefix('patient')->middleware(['auth','patient'])->group (function() {});


Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::prefix('admin')->middleware(['auth','admin'])->group (function() {
    //Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);




    //Doctor Route
    Route::get('doctor',[App\Http\Controllers\Admin\DoctorController::class,'index']);
    Route::get('doctor/create',[App\Http\Controllers\Admin\DoctorController::class,'create']);
    Route::get('doctor/profile/{id}',[App\Http\Controllers\Admin\DoctorController::class,'show']);
    Route::post('doctor',[App\Http\Controllers\Admin\DoctorController::class,'store']);
    Route::get('doctor/edit/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'edit']);
    Route::put('doctor/update/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'update'])->name('doctors.update');


   //Department Route

    Route::get('department',[App\Http\Controllers\Admin\DepartmentController::class,'index']);
    Route::get('department/create',[App\Http\Controllers\Admin\DepartmentController::class,'create']);
    Route::post('department',[App\Http\Controllers\Admin\DepartmentController::class,'store']);
    Route::get('/department/{department_id}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit']);
    Route::put('/department/update/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/department/delete/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'destroy']);


// Schedule Route
    Route::get('schedule',[App\Http\Controllers\Admin\ScheduleController::class,'index']);
    Route::get('schedule/create',[App\Http\Controllers\Admin\ScheduleController::class,'create']);
    Route::post('schedule',[App\Http\Controllers\Admin\ScheduleController::class,'store']);
    Route::get('schedule/edit/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'edit']);
    Route::put('schedule/update/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'update'])->name('schedule.update');


});



