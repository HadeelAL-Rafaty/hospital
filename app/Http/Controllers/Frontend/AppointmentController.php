<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\StorePatientToAppRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $schedule = Schedule::all();
        $schedule->load('doctor.department');
        return view('schedule', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_doctor()
    {

        $doctors=Doctor::all();
        return view('appointment',compact('doctors'));
    }

    public function getAvailableAppointment(\Illuminate\Http\Request $request){
        //dd($request);

        $doctor_id = $request->doctor_id;

        $start_date_time =  Carbon::parse($request->date);
        $appointments =Appointment::where('doctor_id', $doctor_id)
            ->whereDate('start_date_time', "=",$start_date_time)->get();;
        $workingHour = Schedule::where('doctor_id', $doctor_id)->Where('available_days', $start_date_time->dayOfWeek)->get()->toArray();;
        $dateArray = [];
// generate time for each day
        if (count($workingHour) ){
            $times = $this->generateTimes($workingHour);

            // extract date from appoint start date time

            foreach ($appointments as $appointment) {
                // remove time according to appointment time
                // $appointmentDate = Carbon::parse($appointment['start_date_time'])->format('Y-m-d');

                $times = $this->removeTime($times, $appointment);
            }

            // add time to date array
            $dateArray =  $times;

            return response()->json(['data' => $dateArray]);
        }
        else{
            return response()->json(['message' => "the doctor not has schedule"]);

        }
    }
    private function generateTimes(array $workingHour)
    {

        // the working time of the workers must be reduced by at least 1 hour.
        // because there is no way for you to have an appointment on your end working time.
        $startTime = Carbon::parse($workingHour[0]['start_time']);
        $endTime = Carbon::parse($workingHour[0]['end_time'])->subMinutes(30);
        $times = [];
        while ($startTime->lte($endTime)) {
            $times[] = $startTime->format('H:i');
            $startTime->addMinutes(30);
        }

        return $times;
    }

    private function removeTime($times, $appointment)
    {
        $startTime = Carbon::parse($appointment['start_date_time']);
        $endTime = Carbon::parse($appointment['end_date_time']);

        $startTime = $startTime->format('H:i');
        $endTime = $endTime->format('H:i');

        $t = array_values(array_diff($times, [$startTime]));

        return $t;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientToAppRequest $request)
    {
        $fullname=$request->input('fullname');
        $idnumber=$request->input('idnumber');
        $phone=$request->input('phone');
        $doctor_id = $request->input('doctor_id');
        $start_date_time = $request->input('start_date_time');
        $date = $request->input('date');

        $Patient =Patient::where('idnumber', $idnumber)->get()->toArray();

if(count($Patient)==0) {

    $patient = new Patient();
    $patient->fullname = $fullname;
    $patient->idnumber = $idnumber;
    $patient->phone = $phone;
    $patient->save();
    $patient_id = $patient->id;
}else{
    $patient_id = $Patient[0]['id'];
}

        $appointment =new Appointment();
        $appointment->doctor_id = $doctor_id;
        $appointment->patient_id  = $patient_id ;


        $startTime = Carbon::parse($date." ".$start_date_time);
        $appointment->start_date_time = $startTime;

// إضافة 30 دقيقة إلى وقت البداية
        $endTime = Carbon::parse($date." ".$start_date_time)->addMinutes(30);

// تعيين وقت النهاية في الكائن $appointment
        $appointment->end_date_time =$endTime;
        $appointment->save();
        //  dd($request);
        $request->session()->flash('success', 'Appointment Add Successfully.');
        return response()->json(['message' => 'Success'], 200);
    }






}

