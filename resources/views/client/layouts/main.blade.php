

 <!DOCTYPE html>
 <html lang="en" class="no-js">


 <!-- Mirrored from demos.codexcoder.com/labartisan/html/nft/enftomark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Dec 2024 06:46:12 GMT -->

 <head>
     <meta charset="utf-8">

     <meta name="author" content="codexcoder">
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Meta tags for Social Media(Better SEO) -->
     <!-- <meta property="og:title" content=""> -->
     <!-- <meta property="og:type" content=""> -->
     <!-- <meta property="og:url" content=""> -->
     <!-- <meta property="og:image" content=""> -->

     <!-- site favicon -->
     <link rel="icon" type="image/png" href="{{asset('assets22/images/favicon.png')}}">

     <!-- ====== All css file ========= -->
     <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets2/css/icofont.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets2/css/lightcase.css')}}">
     <link rel="stylesheet" href="{{asset('assets2/css/animate.css')}}">
     <link rel="stylesheet" href="{{asset('assets2/css/swiper-bundle.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets2/css/style.min.css')}}">

     <!-- site title -->
     <title>Enftomark</title>
 </head>

 <body class="home-4">
     <!-- preloader start here -->
     <div class="preloader">
         <div class="preloader-inner">
             <div class="preloader-icon">
                 <span></span>
                 <span></span>
             </div>
         </div>
     </div>
     <!-- preloader ending here -->



     <!-- ===============// header section start here \\================= -->
     @include('client.layouts.header')
     <!-- ===============//header section end here \\================= -->

     {{-- main --}}
     @yield('content')
     {{--end main --}}

     <!-- ===============//footer section start here \\================= -->
     @include('client.layouts.footer')
     <!-- ===============//footer section end here \\================= -->



     <!-- scrollToTop start here -->
     <a href="#" class="scrollToTop"><i class="icofont-stylish-up"></i></a>
     <!-- scrollToTop ending here -->




     <!-- All Scripts -->
     <script src="{{asset('assets2/js/jquery-3.6.0.min.js')}}"></script>
     <script src="{{asset('assets2/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('assets2/js/waypoints.min.js')}}"></script>
     <script src="{{asset('assets2/js/lightcase.js')}}"></script>
     <script src="{{asset('assets2/js/swiper-bundle.min.js')}}"></script>
     <script src="{{asset('assets2/js/countdown.min.js')}}"></script>
     <script src="{{asset('assets2/js/jquery.counterup.min.js')}}"></script>
     <script src="{{asset('assets2/js/wow.min.js')}}"></script>
     <script src="{{asset('assets2/js/isotope.pkgd.min.js')}}"></script>
     <script src="{{asset('assets2/js/functions.js')}}"></script>
 </body>


 <!-- Mirrored from demos.codexcoder.com/labartisan/html/nft/enftomark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Dec 2024 06:46:45 GMT -->

 </html>
