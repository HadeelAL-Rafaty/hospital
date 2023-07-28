<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public  function index()
    {
        $patient = Patient::all();
        $doctor=Doctor::all();
        $appointments=Appointment::all();

        return view('admin.dashboard', compact('patient','doctor','appointments'));
    }




    public function index2()
    {
        $doctor = Auth::user()->doctor;
        $numPatients = DB::table('appointments')
            ->where('doctor_id', $doctor->id)
            ->distinct('patient_id')
            ->count();
        $currentDate = Carbon::now()->toDateString();

        $appointments = $doctor->appointments()->whereDate('start_date_time', $currentDate)->get();
        $numAppointments = $appointments->count();



        return view('doctors.dashboardDoctor', compact('numAppointments' ,'doctor','numPatients'));
    }

}
