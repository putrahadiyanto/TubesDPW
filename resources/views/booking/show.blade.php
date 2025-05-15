@extends('layouts.navbar')

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

                @if($booking->status_booking == 'proses')
                    <form action="{{ route('booking.cancel', $booking->id)}}" method="POST" style="margin-right: 10px;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                    </form>
                @endif

                @if($booking->status_pembayaran == 'belum dibayar' && $booking->status_booking == 'proses')
                    <button id="pay-button" class="btn btn-success btn-sm">Bayar</button>                
                @endif

            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        fetch('{{ route('booking.pay', $booking->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log('Response received', data);
            if (data.snapToken) {
                snap.pay(data.snapToken, {
                    onSuccess: function(result){
                        console.log('Payment success', result);
                        window.location.href = '/booking/{{ $booking->id }}';
                    },
                    onPending: function(result){
                        console.log('Payment pending', result);
                        window.location.href = '/booking/{{ $booking->id }}';
                    },
                    onError: function(result){
                        console.log('Payment error', result);
                        window.location.href = '/booking/{{ $booking->id }}';
                    }
                });
            } else {
                console.error('Failed to get snap token:', data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };
</script>
@endsection
    