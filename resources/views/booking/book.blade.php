@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-center mt-4 font-weight-bold">Booking</h2>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-text text-center font-weight-bold">{{ $armada->nik }} {{ $armada->merk }} {{ $armada->model }}</h3>
                    <img src="{{ asset($armada->foto) }}" alt="{{ $armada->merk }} {{ $armada->model }}" class="img-fluid" style="max-width: 300px; height: auto;">
                    <div class="row">
                        <div class="col-sm-6 align-left">
                            <p class="card-text font-weight-bold">Kilometer:</p>
                            <p class="card-text font-weight-bold">Bahan Bakar:</p>
                            <p class="card-text font-weight-bold">Transmisi:</p>
                            <p class="card-text font-weight-bold">Warna:</p>
                            <p class="card-text font-weight-bold">Harga:</p>
                            <p class="card-text font-weight-bold">No. Plat:</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="card-text align-left">{{ number_format($armada->kilometer) }}</p>
                            <p class="card-text align-left">{{ ucfirst($armada->bahan_bakar) }}</p>
                            <p class="card-text align-left">{{ ucfirst($armada->transmisi) }}</p>
                            <p class="card-text align-left">{{ $armada->warna }}</p>
                            <p class="card-text align-left">Rp. {{ number_format($armada->harga, 0, ',', '.') }}</p>
                            <p class="card-text align-left">{{ $armada->no_plat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="col-md-8">
            <form action="{{ route('booking.order') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <input type="hidden" name="id_armada" value="{{ $armada->id }}">
                <input type="hidden" name="id_user" value="{{ auth()->id() }}">
                
                <div class="form-group">
                    <label for="no_telp">No Telepon:</label>
                    <input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan No Telepon" value="{{ old('no_telp') }}" required>
                </div>

            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pickup_date">Pick-up Date:</label>
                        <input type="date" class="form-control" id="pickup_date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="return_date">Return Date:</label>
                        <input type="date" class="form-control" id="return_date" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required>
                    </div>
                </div>
            
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="include_driver" name="supir" {{ old('supir') ? 'checked' : '' }}>
                    <label class="form-check-label" for="include_driver">Include Driver</label>
                </div>
            
                <div class="form-group">
                    <h4 class="font-weight-bold">Total Price:</h4>
                    <p id="total_price" value=""></p>
                </div>                

                <!-- Hidden input field to store total price -->
                <input type="hidden" id="total_harga" name="harga" value="1">
            
                <button type="submit" id="submit_button" class="btn btn-primary btn-block">Book Now</button>
            </form>                        
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pickupDateInput = document.getElementById('pickup_date');
        const returnDateInput = document.getElementById('return_date');
        const includeDriverCheckbox = document.getElementById('include_driver');
        const totalPriceElement = document.getElementById('total_price');
        const totalHargaInput = document.getElementById('total_harga');
        const submitButton = document.getElementById('submit_button');
    
        const dailyRate = {{ $armada->harga }};
        const driverRate = 100000;
    
        function calculateTotalPrice() {
            const pickupDate = new Date(pickupDateInput.value);
            const returnDate = new Date(returnDateInput.value);
            const includeDriver = includeDriverCheckbox.checked;
    
            if (pickupDate && returnDate) {
                if (pickupDate < returnDate) {
                    const timeDiff = Math.abs(returnDate - pickupDate);
                    const days = Math.ceil(timeDiff / (1000 * 60 * 60 * 24)); // Including the pick-up day
        
                    let totalPrice = days * dailyRate;
                    if (includeDriver) {
                        totalPrice += days * driverRate;
                    }
        
                    totalPriceElement.innerText = `Rp. ${totalPrice.toLocaleString('id-ID')}`;
                    totalHargaInput.value = totalPrice;
                    totalPriceElement.classList.remove('text-danger');
                    submitButton.disabled = false;
                } else {
                    totalPriceElement.innerText = 'Tanggal ambil harus sebelum tanggal selesai';
                    totalPriceElement.classList.add('text-danger');
                    submitButton.disabled = true;
                }
            } else {
                totalPriceElement.innerText = '';
                totalHargaInput.value = '';
                submitButton.disabled = true;
            }
        }
    
        pickupDateInput.addEventListener('change', calculateTotalPrice);
        returnDateInput.addEventListener('change', calculateTotalPrice);
        includeDriverCheckbox.addEventListener('change', calculateTotalPrice);

        // Initial call to calculate total price on page load
        calculateTotalPrice();
    });
</script>

@endsection
