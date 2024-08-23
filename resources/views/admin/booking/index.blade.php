@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h1 class="gallery_taital m-4">List Bookings</h1>
            <div class="d-flex justify-content-center mb-4"> <!-- Centering the button -->
                <a href="{{ route('admin.home')}}" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
     </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Armada</th>
                <th>User</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Status Booking</th>
                <th>Status Pembayaran</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->armada->model }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->tanggal_mulai }}</td>
                    <td>{{ $booking->tanggal_akhir }}</td>
                    <td>{{ ucfirst($booking->status_booking) }}</td>
                    <td>{{ ucfirst($booking->status_pembayaran) }}</td>
                    <td class="text-center">
                        <a href="{{ route('booking.show', $booking->id )}}" class="btn btn-primary btn-sm">Details</a>
                        <a href="{{ route('booking.edit', $booking->id )}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('booking.destroy', $booking->id )}}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
