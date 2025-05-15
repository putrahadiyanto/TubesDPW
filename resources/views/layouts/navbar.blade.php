<!DOCTYPE html>
<html>
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>RentCar</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <!-- fevicon -->
   <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
   <!-- font css -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>
<body>
   <!-- header section start -->
   <div class="header_section">
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-white fw-bold" href="/">RentCar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/about">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/armada">Armada</a>
                  </li>
                  @if(Auth::check())
                     <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::user()->is_admin ? '/admin' : '/booking' }}">
                           {{ Auth::user()->name }}
                        </a>
                     </li>
                     <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                     </li>
                  @else
                     <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                     </li>
                  @endif
               </ul>
               <form class="form-inline my-2 my-lg-0">
               </form>
            </div>
         </nav>
      </div>
   </div>
   <!-- header section end -->
   <div class="call_text_main">
      <div class="container">
         <div class="call_taital">
            <div class="call_text"><a href="https://www.google.co.id/maps/place/Kec.+Tambun+Sel.,+Kabupaten+Bekasi,+Jawa+Barat/@-6.2519563,106.971153,12z/data=!3m1!4b1!4m6!3m5!1s0x2e698e5536a17187:0x5f258ff12caf8f2b!8m2!3d-6.2605104!4d107.0557842!16s%2Fg%2F122vlfjq?entry=ttu" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_15">Tambun Selatan</span></a></div>
            <div class="call_text"><a href="https://wa.me/6282111342943" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_15">082111342943</span></a></div>
            <div class="call_text"><a href="https://mail.google.com" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_15">rentcar@gmail.com</span></a></div>
         </div>
      </div>
   </div>

   @yield('content')

   <div class="footer_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="footer_logo"><img src="{{ asset('images/logo.png') }}"></div>
            </div>
         </div>
         <div class="footer_section_2">
            <div class="row">
               <div class="col">
                  <h4 class="footer_taital">Informasi</h4>
                  <p class="lorem_text">Dapatkan informasi terbaru tentang layanan rental mobil kami dan penawaran spesial.</p>
               </div>
               <div class="col">
                  <h4 class="footer_taital">Kendaraan Tersedia</h4>
                  <p class="lorem_text">Lihat armada terbaru kami dan pilih mobil yang sesuai dengan kebutuhan Anda.</p>
               </div>
               <div class="col">
                  <h4 class="footer_taital">Hubungi Kami</h4>
                  <div class="location_text"><a href="https://www.google.co.id/maps/place/Kec.+Tambun+Sel.,+Kabupaten+Bekasi,+Jawa+Barat/@-6.2519563,106.971153,12z/data=!3m1!4b1!4m6!3m5!1s0x2e698e5536a17187:0x5f258ff12caf8f2b!8m2!3d-6.2605104!4d107.0557842!16s%2Fg%2F122vlfjq?entry=ttu"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_15">Alamat: Tambun Selatan, Bekasi</span></a></div>
                  <div class="location_text"><a href="https://wa.me/6282111342943"><i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_15">Telepon: (+62) 8212345678</span></a></div>
                  <div class="location_text"><a href="mailto:rentcar@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_15">Email: rentcar@gmail.com</span></a></div>
               </div>
            </div>
         </div>         
      </div>
   </div>
   <!-- footer section end -->
   <!-- copyright section start -->
   <div class="copyright_section">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <p class="copyright_text">2023 All Rights Reserved. Design by <a href="https://html.design">Free Html Templates</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a></p>
            </div>
         </div>
      </div>
   </div>
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="{{ asset('js/jquery.min.js') }}"></script>
   <script src="{{ asset('js/popper.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
   <script src="{{ asset('js/plugin.js') }}"></script>
   <!-- sidebar -->
   <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
   <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
