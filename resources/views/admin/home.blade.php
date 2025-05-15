@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="mt-5">Welcome, Admin!</h1>
            <div class="mt-3 mb-4">
                <a href="/admin/armada" class="btn btn-primary btn-sm mx-2">Edit Armada</a>
                <a href="/admin/booking" class="btn btn-secondary btn-sm mx-2">Edit Booking</a>
            </div>
        </div>
    </div>
</div>
@endsection
