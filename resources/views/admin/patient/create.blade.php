@extends('layouts.admin.admin_layout')

   @section('admin')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <h4 class="page-title">Add Patient</h4>
                       <a href="{{URL('admin/patient')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <form class="form" action="{{URL ('admin/patient')}}" method="post"
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
                           <div class="row">
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Full Name</label>
                                       <input class="form-control" type="text" name="fullname">
                                       <span class="text-danger"> </span>
                                   </div>
                               </div>

                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>ID Number <span class="text-danger">*</span></label>
                                       <input class="form-control" type="text" name="idnumber">
                                       <span class="text-danger"> </span>
                                   </div>
                               </div>

                               <div class="col-sm-6">

                                   <div class="form-group">
                                       <label>Phone </label>
                                       <input class="form-control" type="text" name="phone">
                                       <span class="text-danger"> </span>
                                   </div>

                               </div>


                           </div>

                               </div>
                               </div>
                           <div class="m-t-20 text-center">
                               <button class="btn btn-primary submit-btn">Create Patient</button>

                           </div>
                       </form>
                   </div>
               </div>
           </div>
               </div>


@stop
