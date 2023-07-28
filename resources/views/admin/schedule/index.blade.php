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
                       <a href="{{URL('admin/schedule/create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
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
                                   <th class="text-right">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach ($schedule as $schedule)
                                   <tr>
                                   <td><img width="28" height="28" src="{{ asset('auploads/doctor/'.$schedule->doctor->avatar) }}" class="rounded-circle m-r-5" alt=""> {{ $schedule->doctor->user->name }}</td>
                                   <td>{{ $schedule->doctor->department->name }}</td>
                                       <td>
                                           @switch($schedule->available_days)
                                               @case(0)
                                                   Sunday
                                                   @break
                                               @case(1)
                                                   Monday
                                                   @break
                                               @case(2)
                                                   Tuesday
                                                   @break
                                               @case(3)
                                                   Wednesday
                                                   @break
                                               @case(4)
                                                   Thursday
                                                   @break
                                               @case(5)
                                                   Friday
                                                   @break
                                               @case(6)
                                                   Saturday
                                                   @break
                                               @default
                                                   Unknown Day
                                           @endswitch
                                       </td>

                               <td>{{ $schedule->start_time }}-{{ $schedule->end_time }}</td>
                                   <td class="text-right">
                                       <div class="dropdown dropdown-action">
                                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                           <div class="dropdown-menu dropdown-menu-right">
                                               <a class="dropdown-item" href="{{ URL('admin/schedule/edit/'.$schedule->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                               <form method="POST" action="{{url('admin/schedule/delete/'. $schedule->id)}}" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" > <i class="fa fa-trash-o m-r-5"></i>  Delete  </button>

                                            </form>                                             </div>
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
