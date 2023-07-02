<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Department;
use App\Models\Doctor;



class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor=Doctor::all();

        return view('admin.doctor.home')->with('doctor',$doctor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $department=Department::all();
        return view('admin.doctor.create',compact('department'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $firstname= $request->input('firstname');
        $lastname = $request->input('lastname');
        $date_of_birth = $request->input('date_of_birth');
        $email = $request->input('email');
        $password = $request->input('password');
        $department_id = $request->input('department_id');
        $gender = $request->input('gender');
        $address = $request->input('address');
        $phone= $request->input('phone');
        $avatar= $request->input('avatar');
        $biography= $request->input('biography');
        $status= $request->input('status');




        $doctor =new Doctor();
        $doctor->firstname = $firstname;
        $doctor->lastname = $lastname;
        $doctor->date_of_birth = $date_of_birth;
        $doctor->email = $email;
        $doctor->password = $password;
        $doctor->department_id = $department_id;
        $doctor->gender = $gender;
        $doctor->phone = $phone;
        $doctor->biography = $biography;
        $doctor->status = $status;
        $doctor->address = $address;
        $auploadPath='auploads/store/';
        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('auploads/doctor/',$filename);
            $request->avatar =$auploadPath.$filename;
        }
        $doctor->avatar = $filename;
        $doctor->save();
        // dd($request);

        return redirect('admin/doctor')->with('massage', 'Doctor Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $doctor=Doctor::all();

        return view('admin.doctor.profile')->with('doctor',$doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctor.edit' , compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request,  $doctor)
    {
        $validatedData = $request->validated();

        $doctor = Doctor::findOrFail($doctor);

        $doctor->name = $validatedData['name'];
        $doctor->phone = $validatedData['phone'];
        $doctor->email = $validatedData['email'];

        $doctor->date_of_birth = $validatedData['date_of_birth'];
       
        $doctor->address = $validatedData['address'];
        $doctor->gender = $validatedData['gender'];

       
    $doctor->update();

    return redirect('admin/doctor')->with('message' , 'Doctor Updated Successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor = Doctor::find($doctor);
        $doctor->delete();
        return redirect('admin/doctor')->with('message' , 'Doctor Delete Successfully');

    }

}