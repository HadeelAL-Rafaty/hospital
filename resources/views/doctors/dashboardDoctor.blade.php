@extends('layouts.doctor.doctor_layout')

   @section('doctor')
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
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{$numPatients}}</h3>
                            <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ \App\Models\Appointment::count2Appointments() }}</h3>
                            <span class="widget-title3">Appointments All<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $numAppointments }}</h3>
                            <span class="widget-title3">Appointments Today<i class="fa fa-check" aria-hidden="true"></i></span>
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
        </div>
    </div>

@stop
