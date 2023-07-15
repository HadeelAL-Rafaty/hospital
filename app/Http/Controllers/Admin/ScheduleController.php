<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Support\Carbon;

class ScheduleController extends Controller
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
        return view('admin.schedule.index', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor=Doctor::where('status', '1')->get();
        return view('admin.schedule.create',compact('doctor'));
        //dd($doctor);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleRequest $request)
    {

        $doctor_id = $request->input('doctor_id');
        $available_days = $request->input('available_days');
        $start_time = $request->input('start_time');
        $end_time= $request->input('end_time');
        $status= $request->input('status');

/*        $available_days_string = implode(',', $available_days);*/

        $schedule =new Schedule();
        $schedule->doctor_id = $doctor_id;
        $schedule->available_days = $available_days;
        $schedule->end_time = $end_time;
        $schedule->start_time = $start_time;
        $schedule->status = $status;
        $schedule->save();
       //  dd($request);
        $request->session()->flash('success', 'Schedule Add Successfully.');
        return redirect('admin/schedule');
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
    public function edit($id)
    {
        $doctor=Doctor::all();
        $schedule=Schedule::findOrFail($id);
        $availableDays = explode(',', $schedule->available_days);
        return view('admin.schedule.edit' , compact('doctor','schedule','availableDays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScheduleRequest  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleRequest $request, $schedule_id)
    {
        $doctor_id = $request->input('doctor_id');
        $available_days = $request->input('available_days');
        $start_time = $request->input('start_time');
        $end_time= $request->input('end_time');
        $status= $request->input('status');

        /*        $available_days_string = implode(',', $available_days);*/
        $schedule=Schedule::find($schedule_id);
        $schedule->doctor_id = $doctor_id;
        $schedule->available_days = $available_days;
        $schedule->end_time = $end_time;
        $schedule->start_time = $start_time;
        $schedule->status = $status;
        $schedule->update();
        //  dd($request);
        $request->session()->flash('success', 'Schedule update Successfully.');
        return redirect('admin/schedule');
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
    private function appoit()
    {
        $appointment = [
            'id' => 1,
            'name' => 'Appointment 1',
            'start_date_time' => '2022-05-23 09:00:00',
            'end_date_time' => '2022-05-23 09:30:00'
        ];

        // Employee A working hours
        $workingHours = collect([
            ['day' => 1, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 2, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 3, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 4, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 5, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 6, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 0, 'start_time' => '08:00:00', 'end_time' => '17:00:00'], // carbon for sunday default is 0
        ]);

        $dateArray = [];
        $startDate = Carbon::parse('2022-05-22');
        $endDate = Carbon::parse('2022-06-01');

        while ($startDate->lte($endDate)) {
            // seach for working hours that match the day of the week
            $workingHour = (array) $workingHours->firstWhere('day', $startDate->dayOfWeek);

            // generate time for each day
            $times = $this->generateTimes($workingHour);

            // extract date from appoint start date time
            $appointmentDate = Carbon::parse($appointment['start_date_time'])->format('Y-m-d');

            if ($appointmentDate === $startDate->format('Y-m-d')) {
                // remove time according to appointment time
                $times = $this->removeTime($times, $appointment);
            }

            // add time to date array
            $dateArray[$startDate->format('Y-m-d')] = $times;

            // increment date
            $startDate->addDay();
        }

        dd($dateArray);
    }

    private function generateTimes(array $workingHour)
    {
        // the working time of the workers must be reduced by at least 1 hour.
        // because there is no way for you to have an appointment on your end working time.
        $startTime = Carbon::parse($workingHour['start_time']);
        $endTime = Carbon::parse($workingHour['end_time'])->subHour();

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

        $times = array_diff($times, [$startTime, $endTime]);

        return $times;
    }
}
