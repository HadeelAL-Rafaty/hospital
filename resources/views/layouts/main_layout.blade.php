<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.pageStyle')

</head>
<body>
  
<!--Header -->
@include('includes.header')


<!--End Header -->


<!--Contact -->

@yield('about')
@yield('appointment')
@yield('contact')
@yield('doctor')
@yield('Home')


<!--Contact -->


<!--Footer -->
@include('includes.footer')

 <!--End Footer -->
 @include('includes.pageJS')

</body>
</html>