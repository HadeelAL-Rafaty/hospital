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
                       <h4 class="page-title">Patients</h4>
                   </div>
                   <div class="col-sm-8 col-9 text-right m-b-20">
                       <a href="{{URL('admin/patient/create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-12">
                       <div class="table-responsive">
                           <table class="table table-border table-striped custom-table datatable mb-0">
                               <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>Age</th>
                                   <th>Address</th>
                                   <th>Phone</th>
                                   <th>Email</th>
                                   <th class="text-right">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach ($patient as $patient)
                               <tr>
                                   <td> {{ $patient->firstname }} {{ $patient->lastname }}</td>
                                   <td>{{ $patient->getAge() }}</td>
                                   <td>{{ $patient->address }}</td>
                                   <td>{{ $patient->phone }}</td>
                                   <td>{{ $patient->email }}</td>
                                   <td class="text-right">
                                       <div class="dropdown dropdown-action">
                                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                           <div class="dropdown-menu dropdown-menu-right">
                                               <a class="dropdown-item" href="{{ URL('admin/patient/edit/'.$patient->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

@stop
