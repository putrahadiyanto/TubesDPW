@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-center mt-4 font-weight-bold">Booking Details</h2>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-text text-center font-weight-bold">{{ $booking->armada->nik }} {{ $booking->armada->merk }} {{ $booking->armada->model }}</h3>
                    <img src="{{ asset($booking->armada->foto) }}" alt="{{ $booking->armada->merk }} {{ $booking->armada->model }}" class="img-fluid" style="max-width: 300px; height: auto;">
                    <div class="row">
                        <div class="col-sm-6 align-left">
                            <p class="card-text font-weight-bold">Kilometer:</p>
                            <p class="card-text font-weight-bold">Bahan Bakar:</p>
                            <p class="card-text font-weight-bold">Transimisi:</p>
                            <p class="card-text font-weight-bold">Warna:</p>
                            <p class="card-text font-weight-bold">Harga:</p>
                            <p class="card-text font-weight-bold">No. Plat:</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="card-text align-left">{{ number_format($booking->armada->kilometer) }}</p>
                            <p class="card-text align-left">{{ ucfirst($booking->armada->bahan_bakar) }}</p>
                            <p class="card-text align-left">{{ ucfirst($booking->armada->transmisi) }}</p>
                            <p class="card-text align-left">{{ $booking->armada->warna }}</p>
                            <p class="card-text align-left">Rp. {{ number_format($booking->armada->harga, 0, ',', '.') }}</p>
                            <p class="card-text align-left">{{ $booking->armada->no_plat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-text text-center font-weight-bold">Booking Information</h3>
                    <div class="row">
                        <div class="col-sm-6 align-left">
                            <p class="card-text font-weight-bold">Nama:</p>
                            <p class="card-text font-weight-bold">Email:</p>
                            <p class="card-text font-weight-bold">No Telepon:</p>
                            <p class="card-text font-weight-bold">Pick-up Date:</p>
                            <p class="card-text font-weight-bold">Return Date:</p>
                            <p class="card-text font-weight-bold">Include Driver:</p>
                            <p class="card-text font-weight-bold">Status Booking:</p>
                            <p class="card-text font-weight-bold">Status Pembayaran:</p>
                            <p class="card-text font-weight-bold">Total Price:</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="card-text align-left">{{ $booking->user->name }}</p>
                            <p class="card-text align-left">{{ $booking->user->email }}</p>
                            <p class="card-text align-left">{{ $booking->no_telp }}</p>
                            <p class="card-text align-left">{{ $booking->tanggal_mulai }}</p>
                            <p class="card-text align-left">{{ $booking->tanggal_akhir }}</p>
                            <p class="card-text align-left">{{ $booking->supir ? 'Yes' : 'No' }}</p>
                            <p class="card-text align-left">{{ ucfirst($booking->status_booking) }}</p>
                            <p class="card-text align-left">{{ ucfirst($booking->status_pembayaran) }}</p>
                            <p class="card-text align-left">Rp. {{ number_format($booking->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex mt-3">
                <a href="{{url()->previous()}}" class="btn btn-secondary btn-sm" style="margin-right: 10px;">Kembali ke Home</a>
                <a href="{{ route('booking.edit', $booking->id )}}" class="btn btn-primary btn-sm" style="margin-right: 10px;">Edit</a>
                <form action="{{ route('booking.destroy', $booking->id )}}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
