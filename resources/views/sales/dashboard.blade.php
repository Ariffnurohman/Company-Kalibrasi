@extends('layouts.sales')

@section('title', 'Dashboard Sales')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Halo, {{ auth()->user()->name }}</h3>

    {{-- Form Pengambilan Alat --}}
    <div class="card shadow-sm rounded-4 p-4">
        <h5 class="mb-3">Form Pengambilan Alat</h5>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('sales.pickup.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Customer / PT</label>
                <input type="text" name="customer" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alat</label>
                <input type="text" name="equipment" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Ambil</label>
                <input type="date" name="pickup_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Pickup</button>
        </form>
    </div>
</div>
@endsection
