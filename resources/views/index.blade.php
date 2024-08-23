@extends ('layouts/navbar')

@section('content')
<!-- banner section start --> 
<div class="banner_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div id="banner_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="banner_taital_main">
                        <h1 class="banner_taital">Sewa Mobil<br><span style="color: #fe5b29;">Dengan Mudah</span></h1>
                        <p class="banner_text">Dengan beberapa step anda sudah bisa mensewa mobil dari RentCar </p>
                        <div class="btn_main">
                           <div class="contact_bt"><a href="/about">About</a></div>
                           <div class="contact_bt active"><a href="/armada">Sewa Sekarang</a></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="banner_taital_main">
                        <h1 class="banner_taital">Sewa Mobil<br><span style="color: #fe5b29;">Terjangkau</span></h1>
                        <p class="banner_text">Dengan harga yang terjangkau anda mendapatkan kualitas mobil yang terbaik di RentCar</p>
                        <div class="btn_main">
                           <div class="contact_bt"><a href="/about">About</a></div>
                           <div class="contact_bt active"><a href="/armada">Sewa Sekarang</a></div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
         <div class="col-md-6">
            <div class="banner_img"><img src="images/porsche.png"></div>
         </div>
      </div>
   </div>
</div>
<!-- banner section end -->
<!-- about section start -->
<div class="about_section layout_padding">
   <div class="container">
      <div class="about_section_2">
         <div class="row">
            <div class="col-md-6"> 
               <div class="image_iman"><img src="{{ asset('images/porsche.png') }}" class="about_img"></div>
            </div>
            <div class="col-md-6"> 
               <div class="about_taital_box">
                  <h1 class="about_taital">Tentang <span style="color: #fe5b29;">Kami</span></h1>
                  <p class="about_text text-justify">Tentang Kami RentCar merupakan perusahaan penyewaan mobil terkemuka yang berkomitmen untuk memberikan layanan berkualitas tinggi kepada pelanggan kami. Dengan armada terbaru dan beragam pilihan mobil, kami menyediakan solusi transportasi yang nyaman dan terpercaya untuk kebutuhan perjalanan Anda. Didukung oleh tim profesional yang berpengalaman, kami siap memberikan pengalaman menyewa mobil yang mulus dan memuaskan. Keamanan dan kenyamanan pelanggan adalah prioritas utama kami, dan kami berusaha untuk selalu memberikan layanan terbaik dalam setiap perjalanan. </p>
                  <div class="readmore_btn"><a href="/about">Read More</a></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- about section end -->
<!-- gallery section start -->
<div class="gallery_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="gallery_taital">Pilihan Mobil Kami</h1>
         </div>
      </div>
      <div class="gallery_section_2">
         <div class="row">
            @foreach($armadas as $armada)
               <div class="col-md-4">
                  <div class="gallery_box">
                     <div class="gallery_img"><img src="{{$armada->foto}}" alt="{{$armada->merk}} {{$armada->model}}"></div>
                     <h3 class="types_text">{{$armada->nik}} {{$armada->merk}} {{$armada->model}}</h3>
                     <p class="looking_text">Rp. {{ number_format($armada->harga, 0, ',', '.') }} / hari</p>
                     <p class="looking_text">Jenis: {{ucfirst($armada->bahan_bakar)}}</p>
                     <p class="looking_text">Transmisi: {{ucfirst($armada->transmisi)}}</p>
                     <div class="read_bt"><a href = "/armada/{{$armada->id}}">Detail</a></div>
                     <div class="read_bt"><a href="/book/{{$armada->id}}">Sewa</a></div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
<!-- gallery section end -->
<!-- choose section start -->
<div class="choose_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="choose_taital">Kenapa Harus RentCar</h1>
         </div>
      </div>
      <div class="choose_section_2">
         <div class="row">
            <div class="col-sm-4">
               <div class="icon_1"><img src="images/icon-1.png"></div>
               <h4 class="safety_text">AMAN & NYAMAN</h4>
               <p class="ipsum_text">RentCar sudah terdaftar oleh OJK dan memiliki pelayanan terbaik di kelasnya</p>
            </div>
            <div class="col-sm-4">
               <div class="icon_1"><img src="images/icon-2.png"></div>
               <h4 class="safety_text">Online Booking</h4>
               <p class="ipsum_text">Sistem booking yang online memudahkan para konsumen </p>
            </div>
            <div class="col-sm-4">
               <div class="icon_1"><img src="images/icon-3.png"></div>
               <h4 class="safety_text">Kualitas Terbaik</h4>
               <p class="ipsum_text">Dengan armada terbaru kualitas mobil menjadi yang terbaik dibanding kompetitor</p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- choose section end -->
<!-- client section start -->
<div class="client_section layout_padding">
   <div class="container">
      <div id="custom_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="client_taital">What Says Customers</h1>
                  </div>
               </div>
               <div class="client_section_2">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="client_taital_box">
                           <div class="client_img"><img src="images/client-img1.png"></div>
                           <h3 class="moark_text">Rizky</h3>
                           <p class="client_text">Rental mobil ini luar biasa! Pelayanannya ramah, mobilnya prima, dan harganya terjangkau. Sangat puas dengan pengalaman menyewa di sini. Akan merekomendasikan kepada teman dan keluarga. Terima kasih RentCar!</p>
                        </div>
                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="client_taital_box">
                           <div class="client_img"><img src="images/client-img2.png"></div>
                           <h3 class="moark_text">Ridho</h3>
                           <p class="client_text">RentCar luar biasa! Pelayanannya ramah, mobilnya prima, harga terjangkau. Puas dengan pengalaman menyewa di sini. Akan merekomendasikan kepada teman. Terima kasih!</p>
                        </div>
                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- client section end -->
@endsection