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

                   <div class="col-sm-5 col-5">
                       <h4 class="page-title">Departments</h4>
                   </div>
                   <div class="col-sm-7 col-7 text-right m-b-30">
                       <a href="{{URL('admin/department/create')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Department</a>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-12">
                       <div class="table-responsive">
                           <table class="table table-striped custom-table mb-0 datatable">
                               <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Department Name</th>
                                   <th class="text-right">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach ($department as $department)

                                   <tr>
                                   <td>{{ $department->id }}</td>
                                   <td>{{ $department->name }}</td>
                                   <td class="text-right">
                                       <div class="dropdown dropdown-action">
                                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                           <div class="dropdown-menu dropdown-menu-right">
                                               <a class="dropdown-item" href="{{URL('admin/department/edit/'.$department->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>


                                               <form method="POST" action="{{url('admin/department/delete/'.$department->id )}}" >
                                                   @csrf
                                                   @method('DELETE')
                                                   <button type="submit" class="dropdown-item" > <i class="fa fa-trash-o m-r-5"></i>  Delete  </button>


                                               </form>


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
