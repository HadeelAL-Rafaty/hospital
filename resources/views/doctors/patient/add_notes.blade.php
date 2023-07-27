@extends('layouts.doctor.doctor_layout')

@section('doctor')
    <div class="page-wrapper">
        <div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add notes to the patient</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('store_name',$appointment->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea name="notes" class="form-control" id="notes" required >{{$appointment->notes}}</textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

@stop
