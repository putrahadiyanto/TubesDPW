@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="gallery_taital m-4">Edit Armada Details</h1>
            <div class="d-flex justify-content-center mb-4">
                <a href="{{ route('armada.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>Edit {{ $armada->nik }} {{ $armada->merk }} - {{ $armada->model }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('armada.update', $armada->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset($armada->foto) }}" alt="Foto" style="width: 100%; height: auto;">
                                <div class="form-group mt-3">
                                    <label for="foto">Change Photo:</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="merk">Merk:</label>
                                    <input type="text" class="form-control" id="merk" name="merk" value="{{ $armada->merk }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="model">Model:</label>
                                    <input type="text" class="form-control" id="model" name="model" value="{{ $armada->model }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK:</label>
                                    <input type="number" class="form-control" id="nik" name="nik" value="{{ $armada->nik }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kilometer">Kilometer:</label>
                                    <input type="number" class="form-control" id="kilometer" name="kilometer" value="{{ $armada->kilometer }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="bahan_bakar">Bahan Bakar:</label>
                                    <select class="form-control" id="bahan_bakar" name="bahan_bakar" required>
                                        <option value="bensin" {{ $armada->bahan_bakar == 'bensin' ? 'selected' : '' }}>Bensin</option>
                                        <option value="diesel" {{ $armada->bahan_bakar == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                        <option value="hybrid" {{ $armada->bahan_bakar == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="transmisi">Transmisi:</label>
                                    <select class="form-control" id="transmisi" name="transmisi" required>
                                        <option value="manual" {{ $armada->transmisi == 'manual' ? 'selected' : '' }}>Manual</option>
                                        <option value="automatic" {{ $armada->transmisi == 'automatic' ? 'selected' : '' }}>Automatic</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="warna">Warna:</label>
                                    <input type="text" class="form-control" id="warna" name="warna" value="{{ $armada->warna }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga:</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $armada->harga }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_plat">No Plat:</label>
                                    <input type="text" class="form-control" id="no_plat" name="no_plat" value="{{ $armada->no_plat }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="disewa" {{ $armada->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                                        <option value="tersedia" {{ $armada->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="pemeliharaan" {{ $armada->status == 'pemeliharaan' ? 'selected' : '' }}>Pemeliharaan</option>
                                    </select>
                                </div>
                                <!-- Add other input fields for editing -->
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
