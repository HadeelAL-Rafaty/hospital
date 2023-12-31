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



//    Route::get('/', function()
//    {
//        return view('index');
//    });

Route::get('/',[App\Http\Controllers\Frontend\DoctorController::class,'index2']);





Route::get('appointment', function () {
    return view('appointment');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});
Route::get('patient', function () {
    return view('patient');
});
Route::get('schedule',[App\Http\Controllers\Frontend\AppointmentController::class,'index']);

/*Route::get('doctors', function () {
    return view('doctors');
});*/
Route::get('doctors',[App\Http\Controllers\Frontend\DoctorController::class,'index']);

//Route::get('/index', function () {
//    return view('index');
//})->name('index');
Route::get('index',[App\Http\Controllers\Frontend\DoctorController::class,'index2']);
Route::get('get-patient-info', [App\Http\Controllers\Frontend\DoctorController::class, 'getPatientInfo']);

//

Route::get('appointment',[App\Http\Controllers\Frontend\AppointmentController::class,'add_doctor']);
Route::get('get_Available_Appointment',[App\Http\Controllers\Frontend\AppointmentController::class,'getAvailableAppointment'])->name('getAvailableAppointment');
Route::post('appointment',[App\Http\Controllers\Frontend\AppointmentController::class,'store'])->name('GetAppointmentAdd');
//
Route::get('/lang/{lang}', [App\Http\Controllers\LanguagesController::class,'switchLang'])->name('lang.switch');

Auth::routes();
Route::get('doctor/home1', [App\Http\Controllers\HomeController::class, 'index2'])->name('home1');
Route::prefix('doctors')->middleware(['auth','doctor'])->group (function() {
    //patient Route
    Route::get('patient',[App\Http\Controllers\Doctor\PatientController::class,'index'])->name('home_p');
    Route::get('patient/add_notes/{id}', [App\Http\Controllers\Doctor\PatientController::class, 'add_notes']);
    Route::post('patients/{id}', [App\Http\Controllers\Doctor\PatientController::class, 'store'])->name('store_name');

    // doctor
    Route::get('doctor',[App\Http\Controllers\Doctor\DoctorController::class,'index']);
    Route::get('doctor/edit/{user_id}/{id}', [App\Http\Controllers\Doctor\DoctorController::class, 'edit']);
    Route::put('doctor/update/{user_id}/{id}', [App\Http\Controllers\Doctor\DoctorController::class, 'update'])->name('doctors.updates');
    // schedule
    Route::get('schedule',[App\Http\Controllers\Doctor\ScheduleController::class,'index']);
    Route::get('schedule/create',[App\Http\Controllers\Doctor\ScheduleController::class,'create']);
    Route::post('schedule',[App\Http\Controllers\Doctor\ScheduleController::class,'store']);
    Route::get('schedule/edit/{id}', [App\Http\Controllers\Doctor\ScheduleController::class, 'edit']);
    Route::put('schedule/update/{id}', [App\Http\Controllers\Doctor\ScheduleController::class, 'update'])->name('schedules.update');
//appointment
    Route::get('get-events', [App\Http\Controllers\Doctor\AppointmentController::class,'__invoke']);


});

Route::get('patient/home', [App\Http\Controllers\HomeController::class, 'index1'])->name('home');
Route::prefix('patient')->middleware(['auth','patient'])->group (function() {});



Route::group(['prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale()], function()
{
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::prefix('admin')->middleware(['auth','admin'])->group (function() {
    //Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);




    //Doctor Route
    Route::get('doctor',[App\Http\Controllers\Admin\DoctorController::class,'index']);
    Route::get('doctor/create',[App\Http\Controllers\Admin\DoctorController::class,'create']);
    Route::get('doctor/profile/{id}',[App\Http\Controllers\Admin\DoctorController::class,'show']);
    Route::post('doctor',[App\Http\Controllers\Admin\DoctorController::class,'store']);
    Route::get('doctor/edit/{user_id}/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'edit']);
    Route::put('doctor/update/{user_id}/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'update'])->name('doctors.update');
    Route::get('doctor/emailview/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'emailview']);
    Route::post('doctor/sendemail/{id}',[App\Http\Controllers\Admin\DoctorController::class,'sendemail']);
    Route::delete('/doctor/delete/{user_id}/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'destroy']);



    //Department Route

    Route::get('department',[App\Http\Controllers\Admin\DepartmentController::class,'index']);
    Route::get('department/create',[App\Http\Controllers\Admin\DepartmentController::class,'create']);
    Route::post('department',[App\Http\Controllers\Admin\DepartmentController::class,'store']);
    Route::get('department/edit/{department_id}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit']);
    Route::put('department/update/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('department.update');
    Route::delete('department/delete/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'destroy']);


// Schedule Route
    Route::get('schedule',[App\Http\Controllers\Admin\ScheduleController::class,'index']);
    Route::get('schedule/create',[App\Http\Controllers\Admin\ScheduleController::class,'create']);
    Route::post('schedule',[App\Http\Controllers\Admin\ScheduleController::class,'store']);
    Route::get('schedule/edit/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'edit']);
    Route::put('schedule/update/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/delete/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'destroy']);

//patient Route
    Route::get('patient',[App\Http\Controllers\Admin\PatientController::class,'index']);
    Route::get('patient/create',[App\Http\Controllers\Admin\PatientController::class,'create']);
    Route::post('patient',[App\Http\Controllers\Admin\PatientController::class,'store']);
    Route::get('patient/edit/{id}', [App\Http\Controllers\Admin\PatientController::class, 'edit']);
    Route::put('patient/update/{id}', [App\Http\Controllers\Admin\PatientController::class, 'update'])->name('patient.update');
    Route::delete('/patient/delete/{id}', [App\Http\Controllers\Admin\PatientController::class, 'destroy']);


    //Appointments Route
    Route::get('appointment',[App\Http\Controllers\Admin\AppointmentController::class,'index']);
    Route::get('/get-patient-data', [App\Http\Controllers\Admin\AppointmentController::class,'getPatientData']);
    Route::get('appointment/create',[App\Http\Controllers\Admin\AppointmentController::class,'create']);
    Route::get('get_Available_Appointment',[App\Http\Controllers\Admin\AppointmentController::class,'getAvailableAppointment'])->name('getAvailableAppointmentss');
    Route::post('appointment',[App\Http\Controllers\Admin\AppointmentController::class,'store'])->name('GetAppointmentAddss');
    Route::get('appointment/edit/{id}', [App\Http\Controllers\Admin\AppointmentController::class, 'edit']);
    Route::post('appointment/update/{id}', [App\Http\Controllers\Admin\AppointmentController::class, 'update'])->name('appointment.update');
    Route::delete('appointment/delete/{id}', [App\Http\Controllers\Admin\AppointmentController::class, 'destroy']);

});

});


