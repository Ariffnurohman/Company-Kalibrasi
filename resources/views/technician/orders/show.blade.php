@extends('layouts.technician')

@section('content')

<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>

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

        <form action="{{ route('technician.orders.updateStatus', $order->id) }}" 
                method="POST" class="mt-4">
                @csrf
                @method('PUT')
        <label class="form-label">Update Status</label>
        <select name="status" class="form-select" required>
            <option value="Pending" {{ $order->status=='Pending'?'selected':'' }}>Pending</option>
            <option value="Processing" {{ $order->status=='Processing'?'selected':'' }}>Processing</option>
            <option value="Calibration" {{ $order->status=='Calibration'?'selected':'' }}>Calibration</option>
            <option value="Waiting Certificate" {{ $order->status=='Waiting Certificate'?'selected':'' }}>Waiting Certificate</option>
            <option value="Completed" {{ $order->status=='Completed'?'selected':'' }}>Completed</option>
        </select>
        
        <button class="btn btn-primary mt-3">Update Status</button>
    </form>

    
    
</div>
</div>
<a href="{{ route('technician.orders.index') }}" class="btn btn-secondary">
    Back to Orders
</a>
<a href="{{ route('technician.orders.workflow', $order->id) }}" 
   class="btn btn-primary">
   Mulai Workflow Kalibrasi
</a>


@if(session('success'))
@endif
@endsection
