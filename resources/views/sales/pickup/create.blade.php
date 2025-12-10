@extends('layouts.sales')

@section('content')
<div class="container mx-auto mt-6">

    <h2 class="text-xl font-bold mb-4">Buat Pengambilan Alat</h2>

    <form action="{{ route('sales.pickup.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label for="order_id">Select Order</label>
            <select name="order_id" class="form-control" required>
                <option value="">-- pilih order --</option>
                @foreach($orders as $order)
                <option value="{{ $order->id }}">
                    {{ $order->order_number }} — {{ $order->customer_name }} ({{ $order->instrument }})
                </option>
                @endforeach
            </select>
        </div>


        <div>
            <label class="block font-semibold mb-1">Customer / PT</label>
            <input type="text" name="customer" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Nama Alat</label>
            <input type="text" name="equipment" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tanggal Pengambilan</label>
            <input type="date" name="pickup_date" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded-lg">
            Simpan
        </button>
    </form>

</div>
@endsection