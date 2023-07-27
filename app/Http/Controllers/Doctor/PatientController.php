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
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
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

        return view('doctors.patient.add_notes' , compact('appointment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, $patient_id)
    {
        $firstname= $request->input('firstname');
        $lastname = $request->input('lastname');
        $date_of_birth = $request->input('date_of_birth');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $address = $request->input('address');
        $phone= $request->input('phone');
        $status= $request->input('status');


        $patient=Patient::find($patient_id);
        $patient->firstname = $firstname;
        $patient->lastname = $lastname;
        $patient->date_of_birth = $date_of_birth;
        $patient->email = $email;
        $patient->password = $password;
        $patient->gender = $gender;
        $patient->phone = $phone;
        $patient->status = $status;
        $patient->address = $address;

        $patient->update();
        // dd($request);
        $request->session()->flash('success', 'Patient Updated Successfully.');
        return redirect('admin/patient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
