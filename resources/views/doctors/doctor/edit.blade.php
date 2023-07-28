@extends('layouts.doctor.doctor_layout')

@section('doctor')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Doctor</h4>
                    <a href="{{URL('doctors/doctor')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                            @endif
                        </div>

                        <form  method="POST" action="{{route('doctors.updates',['user_id' => $doctor->user_id, 'id' => $doctor->id])}}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{ $doctor->user->name }}">
                                        @error('name')
                                        <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="{{ $doctor->user->email }}">
                                        @error('email')
                                        <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" value="{{ $doctor->user->password }}">
                                        @error('password')
                                        <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label>Department</label>
                                        <select class="form-control bg-white" name="department_id"  class="custom-select">
                                            <option selected>--Select--</option>
                                            @foreach ($department as $department)
                                                <option value="{{ $department->id }}" {{ $department->id==$doctor->department_id ?'selected': '' }}>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                        <small class="text-danger"> {{ $message }} </small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="date_of_birth" value="{{ $doctor->date_of_birth }}">
                                            @error('date_of_birth')
                                            <small class="text-danger">
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="M" {{ $doctor->gender == 'M' ? 'checked' : '' }}>Male

                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="F"{{ $doctor->gender == 'F' ? 'checked' : '' }}>Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control " name="address"  value="{{ $doctor->address }}">
                                                @error('address')
                                                <small class="text-danger"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="phone"  value="{{ $doctor->phone }}">
                                        @error('address')
                                        <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Your avatar:</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img src="{{ asset('auploads/doctor/'.$doctor->avatar) }} " width="70px" height="70px" alt="image">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" class="form-control" name="avatar">
                                                @error('avatar')
                                                <small class="text-danger"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>

    </div>
@stop
