@extends('layouts.admin.admin_layout')

   @section('admin')
       <div class="page-wrapper">
           <div class="content">
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <h4 class="page-title">Add Schedule</h4>
                       <a href="{{URL('admin/schedule')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-backward"></i> Back</a>

                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8 offset-lg-2">
                       <form class="form" action="{{route('schedule.update',$schedule->id)}}" method="post"
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
                                           @foreach ($doctor as $doctor)
                                               <option value="{{ $doctor->id }}" {{ $doctor->id == $schedule->doctor_id ? 'selected' : '' }}>{{ $doctor->user->name }}</option>
                                           @endforeach
                                       </select>
                                       <span class="text-danger"> </span>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Available Days</label>
                                       <select class="select" multiple name="available_days[]">
                                           <option>Select Days</option>
                                           <option value="Sunday" {{ in_array('Sunday', $availableDays) ? 'selected' : '' }}>Sunday</option>
                                           <option value="Monday" {{ in_array('Monday', $availableDays) ? 'selected' : '' }}>Monday</option>
                                           <option value="Tuesday" {{ in_array('Tuesday', $availableDays) ? 'selected' : '' }}>Tuesday</option>
                                           <option value="Wednesday" {{ in_array('Wednesday', $availableDays) ? 'selected' : '' }}>Wednesday</option>
                                           <option value="Thursday" {{ in_array('Thursday', $availableDays) ? 'selected' : '' }}>Thursday</option>
                                           <option value="Friday" {{ in_array('Friday', $availableDays) ? 'selected' : '' }}>Friday</option>
                                           <option value="Saturday" {{ in_array('Saturday', $availableDays) ? 'selected' : '' }}>Saturday</option>
                                       </select>
                                       <span class="text-danger"> </span>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Start Time</label>
                                       <div class="time-icon">
                                           <input type="text" class="form-control" id="datetimepicker3" name="start_time" value="{{ $schedule->start_time }}">
                                           <span class="text-danger"> </span>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>End Time</label>
                                       <div class="time-icon">
                                           <input type="text" class="form-control" id="datetimepicker4" name="end_time" value="{{ $schedule->end_time }}">
                                           <span class="text-danger"> </span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="display-block">Schedule Status</label>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" {{ $schedule->status == 'Active' ? 'checked' : '' }}>
                                   <label class="form-check-label" for="product_active">
                                       Active
                                   </label>
                               </div>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive" {{ $schedule->status == 'Inactive' ? 'checked' : '' }}>
                                   <label class="form-check-label" for="product_inactive">
                                       Inactive
                                   </label>
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
