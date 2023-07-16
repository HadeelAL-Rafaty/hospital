<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use http\Env\Request;
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
        $doctor=Doctor::all();

        return view('admin.doctor.home')->with('doctor',$doctor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $department = Department::where('status', 'active')->get();
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
        $user_id = $request->input('user_id');
        $password = $request->input('password');
        $department_id = $request->input('department_id');
        $gender = $request->input('gender');
        $address = $request->input('address');
        $phone= $request->input('phone');
        $avatar= $request->input('avatar');
        $biography= $request->input('biography');
        $status= $request->input('status');

        $user =new User();
        $user->name = $firstname." ". $lastname;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = "doctor";

        $user->save();
$user_id=$user->id;
        $doctor =new Doctor();
        $doctor->user_id = $user_id;
        $doctor->date_of_birth = $date_of_birth;
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
        $request->session()->flash('success', 'Doctor Add Successfully.');
        return redirect('admin/doctor');
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
        $doctors = Doctor::where('status', '1')->get();
        return view('admin.doctor.profile' , compact('doctor','doctors'));
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
        return view('admin.doctor.edit' , compact('doctor','department','user_id'));
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
        $biography = $request->input('biography');
        $status = $request->input('status');
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
        $doctor->biography = $biography;
        $doctor->status = $status;
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

        return redirect('admin/doctor');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $doctor)
    {
        $doctor = Doctor::find($doctor);
        $path= 'uploads/doctor/'.$doctor->avatar;
        if(File::exists($path)){
            File::delete($path);

          }
        $doctor->delete();
        return redirect('admin/doctor')->with('success' , 'Doctor Delete Successfully');
    }


public function emailview($id){
    $doctor=Doctor::find($id);
    return view('admin.doctor.email_view' ,compact('doctor'));
}

public  function sendemail(\Illuminate\Http\Request $request,$id){
    $doctor=Doctor::find($id);
    $details=[
        'firstname' =>$request -> firstname,
    'lastname' =>$request -> lastname,
    'email' =>$request -> email,
    'password' =>$request -> password,

    ];
    Notification::send($doctor,new SendEmailNotification($details));
    return view('admin.doctor.profile' );
}
}
