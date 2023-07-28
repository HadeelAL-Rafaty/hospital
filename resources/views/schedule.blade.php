@extends('layouts.main_layout')

   @section('schedule')

  <div class="page-banner overlay-dark bg-image" style="background-image: url('images/bg_image_1.jpg');">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{('index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Schedule</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Schedule</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-border table-striped custom-table mb-0">
                        <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Department</th>
                            <th>Available Days</th>
                            <th>Available Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($schedule as $schedules)
                            <tr>
                                <td><img width="28" height="28" src="{{ asset('auploads/doctor/'.$schedules->doctor->avatar) }}" class="rounded-circle m-r-5" alt=""> {{ $schedules->doctor->user->name }}</td>
                                <td>{{ $schedules->doctor->department->name }}</td>
                                <td>
                                    @switch($schedules->available_days)
                                        @case(0)
                                            Sunday
                                            @break
                                        @case(1)
                                            Monday
                                            @break
                                        @case(2)
                                            Tuesday
                                            @break
                                        @case(3)
                                            Wednesday
                                            @break
                                        @case(4)
                                            Thursday
                                            @break
                                        @case(5)
                                            Friday
                                            @break
                                        @case(6)
                                            Saturday
                                            @break
                                        @default
                                            Unknown Day
                                    @endswitch
                                </td>

                                <td>{{ $schedules->start_time }}-{{ $schedules->end_time }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
  </div>





@stop
