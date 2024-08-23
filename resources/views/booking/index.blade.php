@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <h1 class="gallery_taital m-4">List Booking</h1>
            </div>
         </div>

        @if ($bookings->isEmpty())
            <div class="alert alert-info" role="alert">
                Tidak Ada Booking
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Armada</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Status Pembayaran</th>
                            <th>Status Booking</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr onclick="window.location='{{ route('show.booking', $booking->id) }}';" style="cursor:pointer;">
                                <td>{{ $booking->armada->merk }} {{ $booking->armada->model }} ({{ $booking->armada->nik }})</td>
                                <td>{{ $booking->tanggal_mulai }}</td>
                                <td>{{ $booking->tanggal_akhir }}</td>
                                <td>{{ ucfirst($booking->status_pembayaran) }}</td>
                                <td>{{ ucfirst($booking->status_booking) }}</td>
                                <td>{{ $booking->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
