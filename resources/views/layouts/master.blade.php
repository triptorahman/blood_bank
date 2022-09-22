<!doctype html>
<html class="no-js" lang="">
<head>
    
     @include('front.layouts.top') {{-- css --}}
     
  

</head>
<!-- Header-->
    @include('front.layouts.header')
<!-- Header-->

<!-- Jeta sent korsi akane dekhabe-->
<body id="top">


    @yield('content') 
        

   




    

    <!-- Footer-->
    {{-- @include('front.layouts.footer') --}}

    <!-- Footer-->

</body>
 <!-- Script-->   
    @include('front.layouts.bottom')

 <!-- Script--> 

</html>
