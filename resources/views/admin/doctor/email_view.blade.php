@extends('layouts.admin.admin_layout')

@section('admin')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-9 offset-lg-2">
                    <h4 class="page-title">Send Email</h4>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 offset-lg-2">
                    <form class="form" action="{{URL('admin/doctor/sendemail/'.$doctor->id)}}" method="post">
                        @csrf                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="firstname" value="{{ $doctor->firstname }}">
                                @error('firstname')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lastname" value="{{ $doctor->lastname }}">
                                @error('lastname')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{ $doctor->email }}">
                                @error('email')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" value="{{ $doctor->password }}">
                                @error('password')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
