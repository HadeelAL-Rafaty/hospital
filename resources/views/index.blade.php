@extends('layouts.main_layout')

   @section('Home')

  <div class="page-hero bg-image overlay-dark" style="background-image: url('images/bg_image_1.jpg');">
    <div class="hero-section">
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
      <div class="container text-center wow zoomIn">
        <span class="subhead">{{__('Provide best quality healthcare for you')}}</span>
        <h1 class="display-4">{{__('Al-Saaَa Medical group')}}</h1>
        <a href="{{('doctors')}}" class="btn btn-primary">{{__('Letَs Consult')}}</a>
      </div>
    </div>
  </div>


  <!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">

    <div class="container" style="padding-top:50px ;">
      <div class="row">
        <div class="col-sm-3 col-md-3">
          <div class="wow fadeInUp" data-wow-delay="0.2s">
            <div class="box text-center" >
              <i class="fa fa-check fa-3x circled bg-skin"></i>
              <img src="{{asset ('images/check.png')}}" alt="" width="100" height="100">
              <h4 class="h-bold" style="padding-top: 20px; font-weight: bold;">{{__('Make an appoinment')}}</h4>
              <p style="padding-top: 10px; color: gray;">
                  {{__('Book your appointment through the website and we will contact you as soon as possible to inform you of your appointment and you will be reminded of it')}}
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-3">
          <div class="wow fadeInUp" data-wow-delay="0.2s">
            <div class="box text-center">

              <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
              <img src="{{asset ('images/chat.png')}}" alt="" width="100" height="100">
              <h4 class="h-bold" style="padding-top: 20px; font-weight: bold;">{{__('Request consulting')}}</h4>
              <p style="padding-top: 10px; color: gray;">
                  {{__('Ask your doctor and consult him about what you need through the doctorًs profile in case you want a quick consultation')}}
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-3">
          <div class="wow fadeInUp" data-wow-delay="0.2s">
            <div class="box text-center">
              <i class="fa fa-user-md fa-3x circled bg-skin"></i>
              <img src="{{asset ('images/nephrologist.png')}}" alt="" width="100" height="100">
              <h4 class="h-bold" style="padding-top: 20px; font-weight: bold;">{{__('Help by specialist')}}</h4>
              <p style="padding-top: 10px; color: gray;">
                  {{__('A complex of clinics equipped with the latest medical and experience administrative competencies to meet the needs of different patients')}}
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-3">
          <div class="wow fadeInUp" data-wow-delay="0.2s">
            <div class="box text-center">

              <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
              <img src="{{asset ('images/report.png')}}" alt="" width="100" height="100">
              <h4 class="h-bold" style="padding-top: 20px; font-weight: bold;">Get diagnostic report</h4>
              <p style="padding-top: 10px; color: gray;">
              Get all your analyzes that you made in our medical laboratory, and they will be sent to you via email or WhatsApp
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /Section: boxes -->

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Welcome to <br> Al-Saa'a Medical group</h1>
            <p class="text-grey mb-4">Al-Saaa Complex takes care of your care in a professional manner that suits your priorities and takes into account all your medical needs
              <br>has accumulated experience and years of hard work in the medical field
             <br> integrated medical services that include medical specialties, to be provided in one place and through customer service
            </p>
            <a href="{{('about')}}" class="btn btn-primary">Learn More</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{asset ('images/bg-doctor.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
          @foreach ($doctor as $doctors)

          <div class="item">


                  <div class="card-doctor">
                      <div class="header">
                          <img src="{{ asset('auploads/doctor/'.$doctors->avatar) }}" alt="">

                      </div>
                      <div class="body">
                          <p class="text-xl mb-0">Dr. {{ $doctors->user->name ?? '' }}</p>
                          <span class="text-sm text-grey">{{ $doctors->department->name }}</span>
                      </div>
                  </div>
          </div>

          @endforeach
      </div>
    </div>
  </div>



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
