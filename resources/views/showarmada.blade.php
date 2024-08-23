@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="gallery_taital m-4">Armada Details</h1>
            <div class="d-flex justify-content-center mb-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>{{ $armada->nik}} {{ $armada->merk }} {{ $armada->model }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset($armada->foto) }}" alt="Foto" style="width: 100%; height: auto;">
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Merk:</strong></div>
                                <div class="col-md-8">{{ $armada->merk }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Model:</strong></div>
                                <div class="col-md-8">{{ $armada->model }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>NIK:</strong></div>
                                <div class="col-md-8">{{ $armada->nik }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Kilometer:</strong></div>
                                <div class="col-md-8">{{ $armada->kilometer }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Bahan Bakar:</strong></div>
                                <div class="col-md-8">{{ ucfirst($armada->bahan_bakar) }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Transmisi:</strong></div>
                                <div class="col-md-8">{{ ucfirst($armada->transmisi) }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Warna:</strong></div>
                                <div class="col-md-8">{{ $armada->warna }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Harga:</strong></div>
                                <div class="col-md-8">{{ number_format($armada->harga) }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>No Plat:</strong></div>
                                <div class="col-md-8">{{ $armada->no_plat }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Status:</strong></div>
                                <div class="col-md-8">{{ ucfirst($armada->status) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
