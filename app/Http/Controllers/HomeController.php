<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;

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
    public function index1()
    {
        return view('patients.home');
    } public function index2()
{
    return view('doctors.dashboardDoctor');
}
}
