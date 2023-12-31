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
                    <h4 class="page-title">Doctors</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{URL('admin/doctor/create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
                </div>
            </div>

            <div class="row doctor-grid">
                @foreach ($doctor as $doctor)
                    <div class="col-md-4 col-sm-4  col-lg-3">

                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="{{ URL('admin/doctor/profile/'.$doctor->id) }}"><img alt="" src="{{ asset('auploads/doctor/'.$doctor->avatar) }} "></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ URL('admin/doctor/edit/'.$doctor->id.'/'.$doctor->user_id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <form method="POST" action="{{url('admin/doctor/delete/'. $doctor->id.'/'.$doctor->user_id)}}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" > <i class="fa fa-trash-o m-r-5"></i>  Delete  </button>

                                    </form>                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="{{URL('admin/doctor/profile/'.$doctor->id)}}">{{ $doctor->user->name ?? '' }}</a></h4>
                            <div class="doc-prof">{{ $doctor->department->name }} </div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> {{ $doctor->address }}
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>

@stop
