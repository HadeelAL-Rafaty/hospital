@extends('layouts.admin.admin_layout')

   @section('admin')
   <div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Edit Department</h4>
                <a href="{{URL('admin/department')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="form-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                        @endif
                    </div>
                    {{-- <form  method="POST" action="{{route('department.update', $department->id)}}"  enctype="multipart/form-data"> --}}
                        <form  method="POST" action="{{url('admin/department/'. $department->id) }}"  enctype="multipart/form-data">   
                        @csrf
                        @method('PUT')
                        <div class="row">
                                <div class="form-group">
                                    <label>Department Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ $department->name }}">
                                    @error('name')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            
                        </div>

                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="department_active" value="1" {{ $department->status == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="department_active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="department_inactive" value="0" {{ $department->status == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="department_inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </div>
                        </form>
                </div>

            </div>
        </div>

</div>
   @stop
