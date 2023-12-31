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
        $doctor=Doctor::all();
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

/*        $available_days_string = implode(',', $available_days);*/

        $schedule =new Schedule();
        $schedule->doctor_id = $doctor_id;
        $schedule->available_days = $available_days;
        $schedule->end_time = $end_time;
        $schedule->start_time = $start_time;
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

        /*        $available_days_string = implode(',', $available_days);*/
        $schedule=Schedule::find($schedule_id);
        $schedule->doctor_id = $doctor_id;
        $schedule->available_days = $available_days;
        $schedule->end_time = $end_time;
        $schedule->start_time = $start_time;
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
    public function destroy($schedule)
    {

            $schedule = Schedule::find($schedule);
            // $path= 'uploads/schedule/'.$schedule->avatar;
            // if(File::exists($path)){
            //     File::delete($path);

            //   }
            $schedule->delete();
            return redirect('admin/schedule')->with('success' , 'Schedule Delete Successfully');
        }

}
