@extends('layouts.admin.admin_layout')

@section('admin')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   @if(session('success'))
                       <div class="col-md-12">
                           <div class="alert alert-success" role="alert">
                               {{ session('success') }}
                           </div>
                       </div>
                   @endif
                   <div class="col-sm-4 col-3">
                       <h4 class="page-title">Appointments</h4>
                   </div>
                   <div class="col-sm-8 col-9 text-right m-b-20">
                       <a href="{{URL('admin/appointment/create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-12">
                       <div class="table-responsive">
                           <table class="table table-striped custom-table">
                               <thead>
                               <tr>
                                   <th>Patient Name</th>
                                   <th>Doctor Name ---> Department</th>
                                   <th>Appointment start_date_time</th>
                                   <th>Appointment End_date_time</th>
                                   <th class="text-right">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach ($appointment as $appointment)

                                   <tr>
                                   <td>{{ $appointment->patient->fullname }}</td>
                                   <td>{{ $appointment->doctor->user->name }}---> {{ $appointment->doctor->department->name }}</td>
                                   <td>{{$appointment->start_date_time}}</td>
                                   <td>{{$appointment->end_date_time}}</td>
                                   <td class="text-right">
                                       <div class="dropdown dropdown-action">
                                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                           <div class="dropdown-menu dropdown-menu-right">
                                               <a class="dropdown-item" href="{{ URL('admin/appointment/edit/'.$appointment->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
@stop
