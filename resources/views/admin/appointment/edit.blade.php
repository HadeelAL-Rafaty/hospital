@extends('layouts.admin.admin_layout')

   @section('admin')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <h4 class="page-title">Add Schedule</h4>
                       <a href="{{URL('admin/appointment')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>

                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <form class="form" action="{{route('appointment.update',$appointment->id)}}" method="post"
                             enctype="multipart/form-data">
                           @csrf
                           @method('PUT')

                           <div class="form-body">
                           <div class="row">
                               @if ($errors->any())
                                   <div class="alert alert-danger">
                                       <ul>
                                           @foreach ($errors->all() as $error)
                                               <li>{{ $error }}</li>
                                           @endforeach
                                       </ul>
                                   </div>
                               @endif

                           </div>
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Patient Name</label>
                                           <select class="select" name="patient_id">
                                               <option>Select</option>
                                               @foreach ($patient as $patient)
                                                   <option value="{{ $patient->id }}" {{ $patient->id==$appointment->patient_id ?'selected': '' }}>
                                                       {{ $patient->fullname }}</option>
                                               @endforeach
                                           </select>
                                           <span class="text-danger"> </span>
                                       </div>
                                   </div>

                                   <div class="col-md-6">

                                       <div class="form-group">
                                           <label>Doctor ---> Department</label>
                                           <select class="select" name="doctor_id">
                                               <option>Select Doctor</option>
                                               @foreach ($doctor as $doctor)
                                                   <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->doctor_id ? 'selected' : '' }}>{{ $doctor->user->name  }} ---> {{ $doctor->department->name }}</option>
                                               @endforeach
                                           </select>
                                           <span class="text-danger"> </span>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                               <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Start date time</label>
                                           <div class="cal-icon">
                                               <input type="text" class="form-control datetimepicker" id="datetimepicker3" name="start_date_time" value="{{$appointment->start_date_time}}">
                                           </div>
                                       </div>
                                   </div>


                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>end date time</label>
                                           <div class="time-icon">
                                               <input type="text" class="form-control datetimepicker" id="datetimepicker3" name="end_date_time" value="{{$appointment->end_date_time}}">
                                               <span class="text-danger"> </span>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                               <div class="form-group">
                                   <label class="display-block">Appointment Status</label>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" {{ $appointment->status == 'Active' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="product_active">
                                           Active
                                       </label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive" {{ $appointment->status == 'Inactive' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="product_inactive">
                                           Inactive
                                       </label>
                                   </div>
                                   <span class="text-danger"> </span>
                               </div>
                               <div class="m-t-20 text-center">
                                   <button class="btn btn-primary submit-btn">update Appointment</button>
                               </div>

                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>



   @stop


