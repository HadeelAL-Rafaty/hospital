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
        $appointment = Appointment::all();

        return view('doctors.appointment.index', compact('appointment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function getEvents(Request $request)
    {
        $doctor = Auth::user()->doctor;
        $appointments = $doctor->appointments;

        $events=array();

        $appointments = Appointment::all();
        foreach ($appointments as $appointment){
            $events[]=[
                'start'=>$appointment->start_date_time,
                'end'=>$appointment->end_date_time,

            ];

        }
        return response()->json($events);
    }*/

    public function getEvents(Request $request)
    {
        $events = Appointment::all();

        $formattedEvents = [];
        foreach ($events as $event) {
            $formattedEvents[] = [
                'start' => $event->start_date_time,
                'end' => $event->end_date_time,
            ];
        }
        return response()->json($formattedEvents);
    }

}

