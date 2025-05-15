@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-center mt-4 font-weight-bold">Edit Booking</h2>
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
                    <h3 class="card-text text-center font-weight-bold">Edit Booking Information</h3>
                        <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 align-left">
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold">Nama:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $booking->user->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="font-weight-bold">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $booking->user->email }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp" class="font-weight-bold">No Telepon:</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $booking->no_telp }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_mulai" class="font-weight-bold">Pick-up Date:</label>
                                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $booking->tanggal_mulai }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tanggal_akhir" class="font-weight-bold">Return Date:</label>
                                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ $booking->tanggal_akhir }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="supir" class="font-weight-bold">Include Driver:</label>
                                        <select class="form-control" id="supir" name="supir">
                                            <option value="1" {{ $booking->supir ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ !$booking->supir ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status_booking" class="font-weight-bold">Status Booking:</label>
                                        <select class="form-control" id="status_booking" name="status_booking">
                                            <option value="proses" {{ $booking->status_booking == 'proses' ? 'selected' : '' }}>Proses</option>
                                            <option value="selesai" {{ $booking->status_booking == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            <option value="batal" {{ $booking->status_booking == 'batal' ? 'selected' : '' }}>Batal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status_pembayaran" class="font-weight-bold">Status Pembayaran:</label>
                                        <select class="form-control" id="status_pembayaran" name="status_pembayaran">
                                            <option value="belum dibayar" {{ $booking->status_pembayaran == 'belum dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                                            <option value="lunas" {{ $booking->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="font-weight-bold">Total Price:</label>
                                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $booking->harga }}">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-3 justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>                                                
                        <div class="d-flex mt-3">
                            <a href="{{url()->previous()}}" class="btn btn-secondary btn-sm" style="margin-right: 10px;">Kembali ke Home</a>
                            <form action="{{ route('booking.destroy', $booking->id )}}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
