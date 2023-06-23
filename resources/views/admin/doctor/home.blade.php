@extends('layouts.admin.admin_layout')

   @section('admin')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   <div class="col-sm-4 col-3">
                       <h4 class="page-title">Doctors</h4>
                   </div>
                   <div class="col-sm-8 col-9 text-right m-b-20">
                       <a href="{{URL('admin/doctor/create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
                   </div>
               </div>

               <div class="row doctor-grid">
                   @foreach ($doctor as $doctor)
                   <div class="col-md-4 col-sm-4  col-lg-3">

                       <div class="profile-widget">
                           <div class="doctor-img">
                               <a class="avatar" href="{{ URL('admin/doctor/profile') }}"><img alt="" src="{{ asset('auploads/doctor/'.$doctor->avatar) }} "></a>
                           </div>
                           <div class="dropdown profile-action">
                               <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                               <div class="dropdown-menu dropdown-menu-right">
                                   <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                   <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                               </div>
                           </div>
                           <h4 class="doctor-name text-ellipsis"><a href="{{URL('admin/doctor/profile')}}">{{ $doctor->firstname }} {{ $doctor->lastname }}</a></h4>
                           <div class="doc-prof">{{ $doctor->department->name }} </div>
                           <div class="user-country">
                               <i class="fa fa-map-marker"></i> {{ $doctor->address }}
                           </div>
                       </div>

                   </div>
                   @endforeach
           </div>

           </div>
       </div>

@stop
