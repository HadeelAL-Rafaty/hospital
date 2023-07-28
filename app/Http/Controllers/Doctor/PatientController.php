<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Auth::user()->doctor;
        $appointments = $doctor->appointments;

        $patients = [];
        if ($appointments->count() > 0) {
            foreach ($appointments as $appointment) {
                $patient = $appointment->patient;
                $patient->appointment = $appointment; // إضافة الموعد إلى بيانات المريض
                $patients[] = $patient;
            }

            return view('doctors.patient.index', compact('patients', 'doctor'));
        } else {
            $message = 'لا توجد بيانات مواعيد لهذا الطبيب.';
            return view('doctors.patient.index', compact('message', 'patients'));
        }
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $notes = $request->input('notes');
        $appointment=Appointment::findOrFail($id);
        $appointment->notes = $notes;
        $appointment->save();

        $request->session()->flash('success', 'Notes Added Successfully.');

        return redirect()->route('home_p', compact('appointment'));
    }








    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function add_notes($id)
    {
        $patient=Patient::findOrFail($id);
        $appointment = Appointment::findOrFail($id);
        $doctor = Doctor::findOrFail($appointment->doctor_id);

        return view('doctors.patient.add_notes' , compact('appointment' , 'doctor'));

    }




}
