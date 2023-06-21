<!DOCTYPE html>
<html lang="en">

@include('includes.admin.adminPageStyle')


<head>
    
</head>

<body>
<div class="main-wrapper">
    {{-- Header --}}
    @include('includes.admin.adminHeader')
    {{-- end Header --}}


    @yield('admin')


    @include('includes.admin.adminPageJS')

</body>
</html>
