@extends('layouts.admin.admin_layout')

   @section('admin')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <h4 class="page-title">Add Department</h4>
                       <a href="{{URL('admin/department')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>

                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <form class="form" action="{{URL ('admin/department')}}" method="post"
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
                               <div class="form-group">
                               <label>Department Name<span class="text-danger">* </span></label>
                               <input class="form-control" type="text" name="name" id="name">
                               </div>
                           <div class="form-group">
                               <label class="display-block">Department Status</label>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" checked>
                                   <label class="form-check-label" for="product_active">
                                       Active
                                   </label>
                               </div>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive">
                                   <label class="form-check-label" for="product_inactive">
                                       Inactive
                                   </label>
                               </div>
                               <span class="text-danger"> </span>
                           </div>
                           <div class="m-t-20 text-center">
                               <button class="btn btn-primary submit-btn">Create Department</button>
                           </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>

       </div>

@stop