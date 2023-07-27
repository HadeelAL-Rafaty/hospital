@extends('layouts.doctor.doctor_layout')

@section('doctor')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-4">
                <h4 class="page-title">Calendar</h4>
            </div>
            <div class="col-sm-4 col-8 text-right m-b-30">
                <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_event"><i class="fa fa-plus"></i> Add Event</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box mb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@stop
