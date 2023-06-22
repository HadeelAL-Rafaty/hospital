@extends('layouts.admin.admin_layout')

   @section('admin')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   <div class="col-lg-9 offset-lg-2">
                       <h4 class="page-title">Add Doctor</h4>

                           <a href="{{URL('admin/doctor')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <form class="form" action="{{URL ('admin/doctor')}}" method="post"
                             enctype="multipart/form-data">
                           @csrf
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
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>First Name <span class="text-danger">*</span></label>
                                       <input class="form-control" type="text" id="firstname" name="firstname">
                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Last Name</label>
                                       <input class="form-control" type="text" id="lastname" name="lastname
                                       .">
                                   </div>
                               </div>

                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Email <span class="text-danger">*</span></label>
                                       <input class="form-control" type="email" id="email" name="email">
                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Password</label>
                                       <input class="form-control" type="password" id="password" name="password">
                                       <span class="text-danger"> </span>
                                   </div>
                               </div>
                               <div class="col-sm-6">
                               <div class="form-group ">
                                   <label>Speacality</label>
                                   <select class="form-control bg-white" name="speacality"  class="custom-select">
                                       <option selected>--Select--</option>
                                       <option>Skin</option>
                                       <option>Cardiology</option>
                                       <option>Kidney</option>
                                       <option>Medicine</option>
                                   </select>
                                   <span class="text-danger"> </span>

                               </div>
                               </div>

                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Date of Birth</label>
                                       <div class="cal-icon">
                                           <input type="text" class="form-control datetimepicker" id="date_of_birth" name="date_of_birth">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group gender-select">
                                       <label class="gen-label">Gender:</label>
                                       <div class="form-check-inline">
                                           <label class="form-check-label">
                                               <input type="radio" name="gender" class="form-check-input">Male
                                           </label>
                                       </div>
                                       <div class="form-check-inline">
                                           <label class="form-check-label">
                                               <input type="radio" name="gender" class="form-check-input">Female
                                           </label>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-12">
                                   <div class="row">
                                       <div class="col-sm-12">
                                           <div class="form-group">
                                               <label>Address</label>
                                               <input type="text" class="form-control " id="address" name="address">
                                               <span class="text-danger"> </span>

                                           </div>
                                       </div>

                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Phone </label>
                                       <input class="form-control" type="text" id="phone" name="phone">
                                       <span class="text-danger"> </span>

                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Avatar</label>
                                       <div class="profile-upload">
                                           <div class="upload-img">
                                               <img alt="" src="">
                                               <span class="text-danger"> </span>
                                           </div>
                                           <div class="upload-input">
                                               <input type="file" class="form-control" name="avatar">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <label>Short Biography</label>
                               <textarea class="form-control" rows="3" cols="30" name="biography"></textarea>
                           </div>
                           <div class="form-group">
                               <label class="display-block">Status</label>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status" id="doctor_active" value="option1" checked>
                                   <label class="form-check-label" for="doctor_active">
                                       Active
                                   </label>
                               </div>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="option2">
                                   <label class="form-check-label" for="doctor_inactive">
                                       Inactive
                                   </label>
                               </div>
                               <span class="text-danger"> </span>

                           </div>
                           <div class="m-t-20 text-center">
                               <button class="btn btn-primary submit-btn">Create Doctor</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>

               </div>

@stop
