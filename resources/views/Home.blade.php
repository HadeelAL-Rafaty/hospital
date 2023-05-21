@extends('layouts.main_layout')

@section('Home')

<!--Slider Image -->
<div class="slideshow-container">
      <div class="mySlides fade">
        <div class="numbertext">1 / 2</div>
        <div class="slider">
        <img class="slider-image" src="images/slider-bg-3.jpg" style="width:100%">
         <div class="textCaption">
            <h2  data-animation-in="slideInRight">Best Medical Care For Yourself <br>and Your Family</h2>
            <p  data-animation-in="slideInRight">The best medical complex in the Gaza Strip.<br> It provides high-level medical services in one place</p>
         
          </div>
        </div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">2 / 2</div>
        <img class="slider-image" src="images/slider-bg-1.jpg" style="width:100%">
        <div class="textCaptionn">
            <h2  data-animation-in="slideInRight">We Care about Your Health</h2>
            <p  data-animation-in="slideInRight">contains a large number of specialized clinics <br> that provide services for all family members in one place</p>
           
          </div>
      </div>
      
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
    
    </div>
    <script>
      var slideIndex = 1;
      showSlides(slideIndex);
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if(n > slides.length) {
          slideIndex = 1
        }
        if(n < 1) {
          slideIndex = slides.length
        }
        for(i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for(i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }
    </script>
<!--End Slider Image -->










<!-- about section start -->
 <h1 class="serves">About us</h1>
 <hr style="height:3px; width:25% ;border-width:0;color:gray;background-color:gray">
 

<div class="rowAbout">
  <div class="columnAbout">
    <img src="images/about.jpg"  style="width:100%" class="aboutImg" >
  </div>
  <div class="columnAbout">
    <img src="images/healthcare.png" style="width:70px ; height: 70px;" >
    <h4 class="healthcare" >Care</h4>
   
  <p > Al-Saaa Complex takes care of your care in a professional manner that suits your priorities and takes into account all your medical needs</p>
  </div>

</div>

<!-- about section end -->


<!--Our Services -->
<section class="containarServices">
<div class="containarServices">
<h1 class="serves">Our services</h1>
<hr style="height:3px; width:25% ;border-width:0;color:gray;background-color:gray">
<section class="servicesBixes">
<div class="cover">
  <div class="box">
    <img  class="servesImage" src="images/clinic.png">
 <h2 class="srevesName">Clinics for free consultations via the website</h2>
    <P>Clinics that include a group of doctors in most medical specialties </P>
  </div>
   <div class="box">
    <img class="servesImage" src="images/hospital.png">
  <h2 class="srevesName">permanent clinics</h2>
    <P>The complex provides 6 permanent clinics with all their equipment: a heart disease clinic - a beauty clinic - a children's clinic - a dental clinic _ a medical laboratory _ an orthopedic clinic</P>
  </div>
   <div class="box">
    <img  class="servesImage" src="images/observation.png">
<h2 class="srevesName">Radiology and lab</h2>
  <P>The complex is equipped with modern X-ray and panorama equipment. It also provides laboratory services under the supervision of doctors <p>
  </div>
   <div class="box">
    <img  class="servesImage" src="images/medical.png">
    <h2 class="srevesName">Health services for patients</h2>
    <P>
Providing all the patient needs of service, treatment and inquiries for some specialties
    </P>
  </div>
</div>
</section>
</div>
</section>
<!--EndOur Services -->


@stop
