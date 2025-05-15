@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h1 class="gallery_taital m-4">Add New Armada</h1>
           <div class="d-flex justify-content-center mb-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            <form action="{{ route('armada.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="merk">Merk:</label>
                    <input type="text" class="form-control" id="merk" name="merk" required>
                </div>
                <div class="form-group">
                    <label for="model">Model:</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="number" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="form-group">
                    <label for="kilometer">Kilometer:</label>
                    <input type="number" class="form-control" id="kilometer" name="kilometer" required>
                </div>
                <div class="form-group">
                    <label for="bahan_bakar">Bahan Bakar:</label>
                    <select class="form-control" id="bahan_bakar" name="bahan_bakar" required>
                        <option value="">Select Bahan Bakar</option>
                        <option value="bensin">Bensin</option>
                        <option value="diesel">Diesel</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transmisi">Transmisi:</label>
                    <select class="form-control" id="transmisi" name="transmisi" required>
                        <option value="">Select Transmisi</option>
                        <option value="manual">Manual</option>
                        <option value="automatic">Automatic</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="warna">Warna:</label>
                    <input type="text" class="form-control" id="warna" name="warna" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>
                <div class="form-group">
                    <label for="no_plat">No Plat:</label>
                    <input type="text" class="form-control" id="no_plat" name="no_plat" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">Select Status</option>
                        <option value="disewa">Disewa</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="pemeliharaan">Pemeliharaan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" class="form-control" id="foto" name="foto" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
     </div>
</div>
@endsection
