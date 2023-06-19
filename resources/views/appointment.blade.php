@extends('layouts.main_layout')
  
   @section('appointment')

  <div class="page-banner overlay-dark bg-image" style="background-image: url('images/bg_image_1.jpg');">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{('index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">appointment</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Appointment</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

   <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form">
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="Doctor" id="departement" class="custom-select">
              <option>Doctor</option>
                    <option>Dr. Najdat Saqer</option>
                    <option>Dr. Eyad abu Maelq</option>
                    <option>Dr. Mahmoudr Khraeis</option>
                    <option>Dr. Naser Hamad</option>
                    <option>Dr. Berta Khattab</option>
                    <option>laboratory Al-Sa'aa</option>
            </select>
          </div>
          
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->

  

@stop