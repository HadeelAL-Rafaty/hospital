@extends('layouts.admin.admin_layout')

@section('admin')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Patient</h4>
                    <a href="{{URL('admin/patient')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form class="form" action="{{route('patient.update',$patient->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="fullname" value="{{ $patient->fullname }}">
                                            @error('fullname')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>ID Number <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="idnumber" value="{{ $patient->idnumber }}">
                                            @error('idnumber')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Phone </label>
                                            <input class="form-control" type="text" name="phone" value="{{ $patient->phone }}">
                                            @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>





                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
