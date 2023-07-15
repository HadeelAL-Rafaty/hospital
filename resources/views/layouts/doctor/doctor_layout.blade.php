<!DOCTYPE html>
<html lang="en">

@include('includes.doctor.doctorPageStyle')


<head>

</head>

<body>
<div class="main-wrapper">
{{--
       Header
--}}
    @include('includes.doctor.doctorHeader')
    {{-- end Header --}}
    {{-- Sidebar --}}
    @include('includes.doctor.doctorSidebar')

{{-- end Sidebar --}}

    @yield('doctor')


    @include('includes.doctor.doctorPageJS')

</body>
</html>
