@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h1 class="gallery_taital m-4">List Armada</h1>
           <div class="d-flex justify-content-center mb-4"> <!-- Add this div for centering -->
                <a href="{{ route('armada.create') }}" class="btn btn-primary btn-sm">Add</a>
            </div>
        </div>
     </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($armadas as $index => $armada)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $armada->nik }} {{ $armada->merk }} {{ $armada->model }}</td>
                    <td>{{ ucfirst($armada->bahan_bakar) }} {{ ucfirst($armada->transmisi) }}</td>
                    <td>{{ $armada->warna }}</td>
                    <td>{{ number_format($armada->harga) }}</td>
                    <td class="text-center"><img src="{{ asset($armada->foto) }}" alt="Foto" style="width: 100px; height: auto;"></td>
                    <td class="text-center">
                        <a href="{{ route('armada.show', $armada->id )}}" class="btn btn-primary btn-sm">Details</a>
                        <a href="{{ route('armada.edit', $armada->id )}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('armada.destroy', $armada->id )}}" method="POST" style="display:inline-block;">
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
