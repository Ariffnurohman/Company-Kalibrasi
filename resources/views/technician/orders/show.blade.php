@extends('layouts.technician')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">

    <h2 class="text-xl font-semibold text-gray-800 mb-4">
        Order Detail
    </h2>

    <div class="space-y-4">

        <div>
            <p class="text-sm text-gray-500 font-medium">Order Number</p>
            <p class="text-lg font-semibold text-gray-700">{{ $order->order_number }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium">Instrument</p>
            <p class="text-lg text-gray-700">{{ $order->instrument }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium">Status</p>
            <span class="
                px-3 py-1 rounded-full text-xs font-bold
                @if($order->status == 'Completed') bg-green-100 text-green-700
                @elseif($order->status == 'Calibration') bg-yellow-100 text-yellow-700
                @elseif($order->status == 'Processing') bg-blue-100 text-blue-700
                @else bg-gray-200 text-gray-700
                @endif
            ">
                {{ $order->status }}
            </span>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium">Description</p>
            <p class="text-gray-700">{{ $order->description ?? '-' }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium">Updated At</p>
            <p class="text-gray-700">{{ $order->updated_at->format('d M Y H:i') }}</p>
        </div>
    </div>

    {{-- Update Status --}}
    <form action="{{ route('technician.orders.updateStatus', $order->id) }}" 
        method="POST" class="mt-6 pt-6 border-t">

        @csrf
        @method('PUT')

        <label class="block text-sm font-medium text-gray-600 mb-1">
            Update Status
        </label>

        <select name="status" 
            class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400"
            required>
            <option value="Pending" {{ $order->status=='Pending'?'selected':'' }}>Pending</option>
            <option value="Processing" {{ $order->status=='Processing'?'selected':'' }}>Processing</option>
            <option value="Calibration" {{ $order->status=='Calibration'?'selected':'' }}>Calibration</option>
            <option value="Waiting Certificate" {{ $order->status=='Waiting Certificate'?'selected':'' }}>Waiting Certificate</option>
            <option value="Completed" {{ $order->status=='Completed'?'selected':'' }}>Completed</option>
        </select>

        <button 
            class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Update Status
        </button>
    </form>

</div>

{{-- Buttons --}}
<div class="mt-6 flex gap-3">

    <a href="{{ route('technician.orders.index') }}" 
        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
        Back to Orders
    </a>

    <a href="{{ route('technician.orders.workflow', $order->id) }}" 
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        Mulai Workflow Kalibrasi
    </a>
</div>

@endsection
