@extends('layouts.doctor.doctor_layout')

@section('doctor')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <h4 class="page-title">Update Schedule</h4>
                       <a href="{{URL('doctors/schedule')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>

                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <form class="form" action="{{route('schedules.update',$schedule->id)}}" method="post"
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
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label >Doctor Name</label>
                                           <select class="select" name="doctor_id">
                                               <option>Select Doctor</option>
                                               <option value="{{ $doctor->id }}" {{ $doctor->id == $schedule->doctor_id ? 'selected' : '' }}>{{ $doctor->user->name }}</option>
                                       </select>
                                       @error('doctor_id')
                                       <small class="text-danger"> {{ $message }} </small>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Available Days</label>
                                       <select class="select"  name="available_days">
                                           <option>Select Days</option>
                                           <option value="0" {{ $schedule->available_days == '0' ? 'selected' : '' }}>Sunday</option>
                                           <option value="1" {{ $schedule->available_days == '1' ? 'selected' : '' }}>Monday</option>
                                           <option value="2" {{ $schedule->available_days == '2' ? 'selected' : '' }}>Tuesday</option>
                                           <option value="3" {{ $schedule->available_days == '3' ? 'selected' : '' }}>Wednesday</option>
                                           <option value="4" {{ $schedule->available_days == '4' ? 'selected' : '' }}>Thursday</option>
                                           <option value="5" {{ $schedule->available_days == '5' ? 'selected' : '' }}>Friday</option>
                                           <option value="6" {{ $schedule->available_days == '6' ? 'selected' : '' }}>Saturday</option>
                                       </select>
                                       @error('available_days')
                                       <small class="text-danger"> {{ $message }} </small>
                                       @enderror
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Start Time</label>
                                       <div class="time-icon">
                                           <input type="text" class="form-control" id="datetimepicker3" name="start_time" value="{{ $schedule->start_time }}">
                                       </div>
                                       @error('start_time')
                                       <small class="text-danger"> {{ $message }} </small>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>End Time</label>
                                       <div class="time-icon">
                                           <input type="text" class="form-control" id="datetimepicker4" name="end_time" value="{{ $schedule->end_time }}">
                                       </div>
                                       @error('end_time')
                                       <small class="text-danger"> {{ $message }} </small>
                                       @enderror
                                   </div>
                               </div>
                           </div>
                           <span class="text-danger"> </span>
                           <div class="m-t-20 text-center">
                               <button class="btn btn-primary submit-btn">update Schedule</button>
                           </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>

       </div>


@stop

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
    $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'LT'
            });
        });
    </script>
@endsection
