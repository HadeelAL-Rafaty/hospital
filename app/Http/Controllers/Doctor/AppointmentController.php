<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('doctors.appointment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __invoke()
    {
        $myEvents = [];
        $doctor = Auth::user()->doctor;

        $appointments = $doctor->appointments;
        $appointments->load('patient');
       // $appointments = Appointment::with(['patient'])->get();

        foreach ($appointments as $appointment) {
            $myEvents[] = [
                'title' => $appointment->patient->fullname ,
                'start' => $appointment->start_date_time,
                'end' => $appointment->end_date_time,
            ];
        }
        return view('doctors.appointment.index',compact('myEvents' ,'doctor'))  ;
    }
}


