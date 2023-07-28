<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

use Notifications;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::all();

        return view('doctors')->with('doctor', $doctor);
    }


    public function index2()
    {
        $doctor = Doctor::all();

        return view('index')->with('doctor', $doctor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getPatientInfo(Request $request)
    {
        $idnumber = $request->input('idnumber');

        // قم بالاستعلام عن معلومات المريض باستخدام رقم الهوية
        $patient = Patient::where('idnumber', $idnumber)->first();

        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }

        $appointments = Appointment::where('patient_id', $patient->id)->get();

        if ($appointments->count() > 0) {
            $appointmentsData = [];
            foreach ($appointments as $appointment) {
                $appointmentData = [
                    'start_date_time' => $appointment->start_date_time,
                    'end_date_time' => $appointment->end_date_time,
                    'notes' => $appointment->notes,
                    // ... يمكنك إضافة المزيد من المعلومات هنا إذا لزم الأمر
                ];
                $appointmentsData[] = $appointmentData;
            }

            $patientData = [
                'name' => $patient->fullname,
                'phone' => $patient->phone,
                'appointments' => $appointmentsData,
            ];

            return response()->json(['data' => $patientData]);
        } else {
            return response()->json(['error' => 'No appointments found for this patient.'], 404);
        }
    }
}
