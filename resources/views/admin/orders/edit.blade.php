@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">

    <!-- Title -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Order</h3>
        <small class="text-muted">Perbarui informasi order #{{ $order->order_number }}</small>
    </div>

    <div class="row">
        <div class="col-lg-8">

            <!-- Form Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header font-bold py-5">
                    <h5 class="fw-bold mb-0">Order Information</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Customer Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Customer Name</label>
                            <input type="text" name="customer_name" class="form-control form-control-lg"
                                value="{{ $order->customer_name }}" required>
                        </div>

                        <!-- Instrument -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Instrument</label>
                            <input type="text" name="instrument" class="form-control form-control-lg"
                                value="{{ $order->instrument }}" required>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Order Status</label>
                            <select name="status" class="form-select form-select-lg">
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                <option value="Calibration" {{ $order->status == 'Calibration' ? 'selected' : '' }}>Calibration</option>
                                <option value="Waiting Certificate" {{ $order->status == 'Waiting Certificate' ? 'selected' : '' }}>Waiting Certificate</option>
                                <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <!-- Dates -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Received Date</label>
                                <input type="date" name="received_date" class="form-control form-control-lg"
                                    value="{{ $order->received_date }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Completed Date</label>
                                <input type="date" name="completed_date" class="form-control form-control-lg"
                                    value="{{ $order->completed_date }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            
                        <label class="form-label">Assign Technician</label>
                        <select name="technician_id" class="form-control">
                            <option value="">-- No Technician --</option>

                            @foreach($technicians as $tech)
                                <option value="{{ $tech->id }}" 
                                    {{ $order->technician_id == $tech->id ? 'selected' : '' }}>
                                    {{ $tech->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                        <!-- Update Button -->
                        <div class="mt-4">
                            <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-focus w-100">
                                <i class="bi bi-save me-2"></i> Update Order
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

        <!-- Right Column -->
        <div class="col-lg-4">

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header font-bold  py-3">
                    <h5 class="fw-bold mb-0">Quick Actions</h5>
                </div>

                <div class="card-body">

                    <a href="{{ route('admin.orders.show', $order->id) }}" 
                       class="btn btn-outline-secondary bg-white w-100 mb-2">
                        <i class="bi bi-eye me-2"></i> View Order
                    </a>

                    <a href="{{ route('admin.orders.index') }}" 
                       class="btn btn-outline-secondary bg-white w-100">
                        <i class="bi bi-arrow-left me-2"></i> Back to Orders
                    </a>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection
