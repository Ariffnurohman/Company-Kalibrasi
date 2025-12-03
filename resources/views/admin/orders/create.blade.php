@extends('layouts.create')

@section('title', 'Create Order')

@section('form')

<form action="{{ route('admin.orders.store') }}" method="POST">
    @csrf

    {{-- Grid 1 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="form-group">
            <input type="text" name="customer_name" placeholder=" " required>
            <label>Customer Name</label>
        </div>

        <div class="form-group">
            <input type="text" name="instrument" placeholder=" " required>
            <label>Instrument</label>
        </div>

    </div>

    {{-- Grid 2 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

        <div class="form-group">
            <select name="status" placeholder=" " required>
                <option value="" disabled selected></option>
                <option value="Pending">Pending</option>
                <option value="On Progress">On Progress</option>
                <option value="Completed">Completed</option>
            </select>
            <label>Status</label>
        </div>

        <div class="form-group">
            <input type="date" name="received_date" placeholder=" " value="{{ date('Y-m-d') }}">
            <label>Received Date</label>
        </div>

    </div>

    {{-- Notes --}}
    <div class="mt-6 form-group">
        <textarea name="notes" placeholder=" "></textarea>
        <label>Notes (optional)</label>
    </div>

    {{-- Buttons --}}
    <div class="flex justify-end gap-4 mt-8">
        <a href="{{ route('admin.orders.index') }}" class="mate-btn-secondary">
            Cancel
        </a>

        <button type="submit" class="mate-btn-primary">
            Create Order
        </button>
    </div>

</form>

@endsection
