<!DOCTYPE html>
<html lang="en">

@include('includes.admin.adminPageStyle')


<head>

</head>

<body>
<div class="main-wrapper">
{{--
       Header
--}}
    @include('includes.admin.adminHeader')
    {{-- end Header --}}
    {{-- Sidebar --}}
    @include('includes.admin.adminSidebar')

{{-- end Sidebar --}}

    @yield('admin')


    @include('includes.admin.adminPageJS')

</body>
</html>
