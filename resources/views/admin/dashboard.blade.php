@extends('layouts.admin.admin_layout')

   @section('admin')
       <div class="col-lg-9">

           @if(session('message'))
               <h2>{{session('message')}}</h2>
               <h2 style="background-color: red">hello</h2>

           @endif

       </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ \App\Models\Doctor::countDoctors() }}</h3>
                            <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ \App\Models\Patient::countPatients() }}</h3>
                            <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ \App\Models\Appointment::countAppointments() }}</h3>
                            <span class="widget-title3">Appointments <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ \App\Models\Department::countDepartments() }}</h3>
                            <span class="widget-title4">Departments<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Patient Total</h4>
                                <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
                            </div>
                            <canvas id="linegraph"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Patients In</h4>
                                <div class="float-right">
                                    <ul class="chat-user-total">
                                        <li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
                                        <li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
                                    </ul>
                                </div>
                            </div>
                            <canvas id="bargraph"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block"> Appointments</h4> <a href="{{ URL('admin/appointment') }}" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Doctor Name ---> Department</th>
                                        <th>Appointment start_date_time</th>
                                        <th>Appointment End_date_time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($appointments as $appointment)

                                        <tr>
                                            <td>{{ $appointment->patient->fullname }}</td>
                                            <td>{{ $appointment->doctor->user->name }}---> {{ $appointment->doctor->department->name }}</td>
                                            <td>{{$appointment->start_date_time}}</td>
                                            <td>{{$appointment->end_date_time}}</td>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0">Doctors</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($doctor as $doctors)

                            <ul class="contact-list">
                                <li>
                                    <div class="contact-cont">
                                        <div class="float-left user-img m-r-10">
                                            <a href="{{ URL('admin/doctor/profile/'.$doctors->id) }}" title="{{ $doctors->user->name }}"><img src="{{ asset('auploads/doctor/'.$doctors->avatar) }}" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-name text-ellipsis">{{ $doctors->user->name }}</span>
                                            <span class="contact-date">{{ $doctors->department->name }}</span>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                            @endforeach
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="{{ URL('admin/doctor') }}" class="text-muted">View all Doctors</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">New Patients </h4> <a href="{{ URL('admin/patient') }}" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table mb-0 new-patient-table">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>ID Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($patient as $patient)
                                        <tr>
                                            <td> {{ $patient->fullname }} </td>
                                            <td>{{ $patient->phone }}</td>
                                            <td>{{ $patient->idnumber }}</td>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>

            </div>
        </div>
    </div>
<div class="sidebar-overlay" data-reff=""></div>
@stop
