@extends('layouts.doctor.doctor_layout')

@section('doctor')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Patients</h4>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>ID Number</th>
                                <th>Appointment Start Date/Time</th>
                                <th>Appointment End Date/Time</th>
                                <th>Notes</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->fullname }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->idnumber }}</td>
                                    <td>{{ $patient->appointment->start_date_time }}</td>
                                    <td>{{ $patient->appointment->end_date_time }}</td>
                                    <td>{{ $patient->appointment->notes }}</td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ URL('doctors/patient/add_notes/'.$patient->appointment->id) }}"><i class="fa fa-pencil m-r-5"></i> Add notes</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
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
