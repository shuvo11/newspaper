<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World Time</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{URL::to('/assets/vendors/mdi/css/materialdesignicons.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('/assets/vendors/aos/dist/aos.css/aos.css')}}" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{URL::to('/assets/images/favicon.png')}}"/>

    <!-- inject:css -->
    <link rel="stylesheet" href="{{URL::to('/assets/css/style.css')}}">
    <!-- endinject -->
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
  
        @include('layout-fontend.Header')
   
        <!-- main-panel ends -->
        <!-- container-scroller ends -->
        @yield('content')
        <!-- partial:partials/_footer.html -->
       

        <!-- partial -->
      </div>
    </div>
    
    @include('layout-fontend.Footer')



    <!-- inject:js -->
    <script src="{{URL::to('/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{URL::to('/assets/vendors/aos/dist/aos.js/aos.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{URL::to('/assets/js/demo.js')}}"></script>
    <script src="{{URL::to('/assets/js/jquery.easeScroll.js')}}></script>
    <!-- End custom js for this page-->
  </body>
</html>
