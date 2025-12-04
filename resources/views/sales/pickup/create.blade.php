@extends('layouts.sales')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Form Pengambilan Alat</h3>

    <form action="{{ route('sales.pickup.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Customer</label>
            <input type="text" name="customer" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alat</label>
            <input type="text" name="equipment" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pengambilan</label>
            <input type="date" name="pickup_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
@endsection
