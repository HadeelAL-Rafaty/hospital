@extends('layouts.admin.admin_layout')

   @section('admin')
   <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h3> Edit Doctor
                <a href="{{ url('admin/doctor') }}" class="btn btn-primary  float-end">BACK</a>
            </h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
        <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
         @endif
         </div>

            <form action="{{ url('../admin/update-doctor/'. $doctor->id) }}" method="POST" >
                @csrf
                @method('PUT')

                <div class=" mb-3">
                    <label for="">Name</label>
                    <input type="text" name="Name" value="{{ $doctor->name }}" class="form control" />
                    @error('name')
                    <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class=" mb-3">

                    <label>Phone</label>
                    <input type="text" name="Phone" value="{{ $doctor->phone }}" class="form control" />
                    @error('phone')
                    <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label>Email</label>
                    <input type="text" name="email" value="{{ $doctor->email }}" class="form control" />
                    @error('email')
                    <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Birthday</label>
                    <input type="text" name="Birthday" value="{{ $doctor->date_of_birth }}" class="form control" />
                    @error('date_of_birth')
                    <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label>Address</label>
                    <input type="text" name="Address" value="{{ $doctor->address }}" class="form control" />
                    @error('address')
                    <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label>Gender</label>
                    <input type="text" name="Gender" value="{{ $doctor->gender }}" class="form control" />
                    @error('gender')
                    <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                
                
                <div class="mb-3">
                <button type="submit" class="btn btn-primary float-end">Update</button>
                </div>
                </div>

            </form>

        </div>
        </div>

</div>
</div>


   @stop
