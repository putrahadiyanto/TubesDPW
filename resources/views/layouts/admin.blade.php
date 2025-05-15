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
                  @if(Auth::check())
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('armada.index') }}">Manage Armada</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('booking.index') }}">Manage Booking</a>
                          </li>
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

   @yield('content')

</body>
</html>