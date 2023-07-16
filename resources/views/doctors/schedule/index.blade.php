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
                       <h4 class="page-title">Schedule</h4>
                   </div>
                   <div class="col-sm-8 col-9 text-right m-b-20">
                       <a href="{{URL('doctors/schedule/create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-12">
                       <div class="table-responsive">
                           <table class="table table-border table-striped custom-table mb-0">
                               <thead>
                               <tr>
                                   <th>Doctor Name</th>
                                   <th>Department</th>
                                   <th>Available Days</th>
                                   <th>Available Time</th>
                                   <th>Status</th>
                                   <th class="text-right">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @if ($schedules)
                               @foreach ($schedules as $schedule)
                                   <tr>
                                   <td><img width="28" height="28" src="{{ asset('auploads/doctor/'.$schedule->doctor->avatar) }}" class="rounded-circle m-r-5" alt=""> {{ $schedule->doctor->user->name }}</td>
                                   <td>{{ $schedule->doctor->department->name }}</td>
                                   <td>{{ $schedule->available_days }}</td>
                                       <td>{{ $schedule->start_time }}-{{ $schedule->end_time }}</td>
                                   <td><span class="custom-badge status-green">{{ $schedule->status }}</span></td>
                                   <td class="text-right">
                                       <div class="dropdown dropdown-action">
                                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                           <div class="dropdown-menu dropdown-menu-right">
                                               <a class="dropdown-item" href="{{ URL('doctors/schedule/edit/'.$schedule->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_schedule"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               @endforeach
                               @else
                                   <p>No schedules available.</p>
                               @endif
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>

@stop
