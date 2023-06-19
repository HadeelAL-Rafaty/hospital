@extends('layouts.main_layout')
  
   @section('about')

  <div class="page-banner overlay-dark bg-image" style="background-image: url('images/bg_image_1.jpg');">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{('index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">About Us</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-secondary text-white">
              <span class="mai-chatbubbles-outline"></span>
            </div>
            <p><span>Chat</span> with a doctors</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-primary text-white">
              <span class="mai-shield-checkmark"></span>
            </div>
            <p><span>Al-Saa'a</span>- Protection</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-accent text-white">
              <span class="mai-basket"></span>
            </div>
            <p><span>Al-Saa'a</span>- Pharmacy</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<br>
<br>
   <div class="container-Services">
        <h2>Our Services</h2>
        <section class="services">
            <div class="card">
                <div class="content">  

                    <div class="icon"><img src="{{asset ('images/pediatrics.png')}}" alt="" width="100" height="100"></div>
                    <div class="title" >Pediatrics</div>
                    <p>pediatrics with Dr. Iyad Abu Muaileq. In the clinic, he provides services, including a blood oxygen monitor and a blood pressure monitor for children</p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="icon"><img src=" {{asset ('images/tooth.png')}}" alt="" width="100" height="100"></div>
                    <div class="title">Dental clinic</div>
                    <p>Dental clinic with Dr. Najdat Saqr, specialized in several areas, including Endodontics dental nerves and periodontal medicine </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="icon"><img src=" {{asset ('images/healthcare.png')}}" alt="" width="100" height="100"></div>
                    <div class="title" >Heart clinic </div>
                    <p>Heart clinic with Dr. Nasser Hamad, a specialist in cardiovascular diseases, and there is a modern device for imaging the heart</p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="icon"><img src=" {{asset ('images/fracture.png')}}" alt="" width="100" height="100"></div>
                    <div class="title">Rheumatology clinic </div>
                    <p>Rheumatology clinic with Dr. Mahmoud Khreis, a consultant rheumatologist and joint specialist</p>
                </div>
            </div>
            <div class="card">




<div class="content">
                    <div class="icon"><img src=" {{asset ('images/surgery.png')}}" alt="" width="100" height="100"></div>
                    <div class="title">Beauty clinic</div>
                    <p>A beauty clinic with skin specialist Berta Khattab and specialist Amal Al-Hajj. The clinic contains advanced equipment</p>
                </div>


                
            </div>
            <div class="card">
                <div class="content">
                    <div class="icon"><img src=" {{asset ('images/microscope.png')}}" alt="" width="100" height="100"></div>
                    <div class="title">Laboratory </div>
                    <p>Al-Saa Laboratory for Medical Analysis contains all the necessary equipment for all types of medical examinations</p>
                </div>
            </div>
        </section>
    </div>

  

 @stop