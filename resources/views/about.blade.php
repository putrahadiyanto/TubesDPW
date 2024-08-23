@extends('layouts.navbar')

@section('content')
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
                  <p class="about_text text-justify">Tentang Kami RentCar merupakan perusahaan penyewaan mobil terkemuka yang berkomitmen untuk memberikan layanan berkualitas tinggi kepada pelanggan kami. Dengan armada terbaru dan beragam pilihan mobil, kami menyediakan solusi transportasi yang nyaman dan terpercaya untuk kebutuhan perjalanan Anda. Didukung oleh tim profesional yang berpengalaman, kami siap memberikan pengalaman menyewa mobil yang mulus dan memuaskan. Keamanan dan kenyamanan pelanggan adalah prioritas utama kami, dan kami berusaha untuk selalu memberikan layanan terbaik dalam setiap perjalanan.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- about section end -->
@endsection