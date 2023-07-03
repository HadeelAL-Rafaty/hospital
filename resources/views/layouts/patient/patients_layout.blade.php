<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.patient.patientPageStyle')

</head>
<body>

<!--Header -->
@include('includes.patient.patientHeader')


<!--End Header -->


<!--Contact -->

@yield('about')
@yield('appointment')
@yield('contact')
@yield('doctor')
@yield('homes')


<!--Contact -->


<!--Footer -->
@include('includes.patient.patientFooter')

 <!--End Footer -->
 @include('includes.patient.patientPageJS')

</body>
</html>
