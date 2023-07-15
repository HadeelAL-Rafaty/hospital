<?php

namespace App\Providers;

use App\Models\Appointment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('unique_patient_schedule', function ($attribute, $value, $parameters, $validator) {
            $patientId = $parameters[0];
            $date = $value['date'];
            $time = $value['time'];

            // التحقق من عدم تواجد مواعيد متكررة لنفس المريض ونفس اليوم والوقت
            $count = Appointment::where('patient_id', $patientId)
                ->where('date', $date)
                ->where('time', $time)
                ->count();

            return $count === 0;
        });
    }
}
