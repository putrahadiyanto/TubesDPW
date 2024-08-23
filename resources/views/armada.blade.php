@extends('layouts.navbar')

@section('content')
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
@endsection