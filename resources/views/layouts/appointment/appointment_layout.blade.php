<!DOCTYPE html>
<html lang="en">

@include('includes.appointment.appointmentPageStyle')


<head>

</head>

<body>
<div class="main-wrapper">
{{--
       Header
--}}
    @include('includes.appointment.appointmentHeader')
    {{-- end Header --}}
    {{-- Sidebar --}}
    @include('includes.appointment.appointmentSidebar')

{{-- end Sidebar --}}

    @yield('appointment')


    @include('includes.appointment.appointmentPageJS')

</body>
</html>
