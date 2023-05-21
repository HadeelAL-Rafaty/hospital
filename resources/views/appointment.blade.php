@extends('layouts.main_layout')

@section('appointment')
<!--Contact -->

<div class="containerAppointment">
        <form>
            <h2>Request Appointment</h2>
            <input type="text" id="firstName" placeholder="First Name" required>
            <input type="text" id="lastName" placeholder="Last Name" required>
            <input type="email" id="email" placeholder="Email" required>
            <input type="text" id="mobile" placeholder="Mobile" required>
                <br>
            <div class="form-group">
                  <select class="form-control" name="subject">
                    <option>Departments</option>
                    <option>Dental Clinic</option>
                    <option>pediatric Clinic</option>
                    <option>Rheumatology Clinic</option>
                    <option>Heart Clinic</option>
                    <option>Beauty Clinic</option>
                    <option>medical laboratory</option>
                  </select>
                  <br>
                </div>
                <div class="form-group">
                  <select class="form-control" name="subject">
                    <option>Doctor</option>
                    <option>Dr. Najdat Saqer</option>
                    <option>Dr. Eyad abu Maelq</option>
                    <option>Dr. Mahmoudr Khraeis</option>
                    <option>Dr. Naser Hamad</option>
                    <option>Dr. Berta Khattab</option>
                    <option>laboratory Al-Sa'aa</option>
                  </select>
                </div>
            <h4>Type Your Message Here...</h4>
            <textarea required></textarea>
           
            <input type="submit" value="Send" id="button">
        </form>
    </div>
<!--Contact -->
@stop

