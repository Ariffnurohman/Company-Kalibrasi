@extends('layouts.technician')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-bold">
        Order Detail
    </div>

    <div class="card-body">

        <div class="mb-3">
            <strong>Order Number:</strong>
            <p>{{ $order->order_number }}</p>
        </div>

        <div class="mb-3">
            <strong>Instrument:</strong>
            <p>{{ $order->instrument }}</p>
        </div>

        <div class="mb-3">
            <strong>Status:</strong>
            <span class="badge bg-{{
                $order->status == 'Completed' ? 'success' :
                ($order->status == 'Calibration' ? 'warning' :
                ($order->status == 'Processing' ? 'primary' : 'secondary'))
            }}">
                {{ $order->status }}
            </span>
        </div>

        <div class="mb-3">
            <strong>Description:</strong>
            <p>{{ $order->description ?? '-' }}</p>
        </div>

        <div class="mb-3">
            <strong>Updated At:</strong>
            <p>{{ $order->updated_at->format('d M Y H:i') }}</p>
        </div>

        <a href="{{ route('technician.orders.index') }}" class="btn btn-secondary">
            Back to Orders
        </a>

    </div>
</div>

@endsection
