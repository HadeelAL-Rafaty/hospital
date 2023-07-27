<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 text-sm">
          <div class="site-info">
            <a href="{{('')}}"><span class="mai-call text-primary"></span> +972 000 000</a>
            <span class="divider">|</span>
            <a href="{{('#')}}"><span class="mai-mail text-primary"></span> Al-Saa_Medical@gmail.com</a>
          </div>
        </div>
        <div class="col-sm-4 text-right text-sm">
          <div class="social-mini-button">
            <a href="https://wa.link/iktfpn"><span class="mai-logo-whatsapp"></span></a>
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-instagram"></span></a>
          </div>
        </div>
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .topbar -->

  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
      <img src="{{asset ('images/logo.png')}}" alt="" width="150" height="60">



      <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ ('index' )}}">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ ('about') }}">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ ('doctors') }}">Doctors</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{URL ('appointment') }}">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ ('contact') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
          </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
      </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
  </nav>
</header>
