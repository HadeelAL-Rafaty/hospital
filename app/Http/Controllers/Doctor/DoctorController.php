<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
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
        $doctor = Auth::user()->doctor;
       // dd($doctor);

        return view('doctors.doctor.index',compact('doctor'));
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor=Doctor::findOrFail($id);
        $doctors = Doctor::all();
        return view('doctors.doctor.profile' , compact('doctor','doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$user_id)
    {
        $department=Department::all();
        $doctor=Doctor::findOrFail($id);
        $user_id=User::findOrFail($user_id);
        return view('doctors.doctor.edit' , compact('doctor','department','user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, $user_id, $id)
    {
        $name = $request->input('name');
        $date_of_birth = $request->input('date_of_birth');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $avatar = $request->input('avatar');
        $department_id = $request->input('department_id');

        // التحقق من وجود سجل موجود بنفس البريد الإلكتروني
        $user = User::where('email', $email)->first();

        if ($user && $user->id != $user_id) {
            // يوجد سجل موجود بنفس البريد الإلكتروني
            return back()->withErrors(['email' => 'This email is already in use.']);
        }

        // تحديث بيانات المستخدم
        $user = User::findOrFail($user_id);
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->email = $email;
        $user->role = "doctor";
        $user->update();

        // تحديث بيانات الطبيب
        $doctor = Doctor::findOrFail($id);
        $doctor->department_id = $department_id;
        $doctor->date_of_birth = $date_of_birth;
        $doctor->gender = $gender;
        $doctor->phone = $phone;
        $doctor->address = $address;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('auploads/doctor/', $filename);
            $doctor->avatar = $filename;
        }

        $doctor->update();

        $request->session()->flash('success', 'Doctor Updated Successfully.');


        return redirect('doctors/doctor');
    }








}
