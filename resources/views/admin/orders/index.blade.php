@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-semibold">Orders</h4>

    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Order Manual
    </a>
</div>

{{-- FILTERS --}}
<div class="d-flex gap-2 flex-wrap mb-3">
    <button class="btn btn-outline-secondary btn-sm">Type</button>
    <button class="btn btn-outline-secondary btn-sm">Status</button>
    <button class="btn btn-outline-secondary btn-sm">Order Date</button>
    <button class="btn btn-outline-secondary btn-sm">All Filters</button>

    <div class="ms-auto d-flex gap-2">
        <button class="btn btn-dark btn-sm"><i class="bi bi-upload"></i> Import</button>
        <button class="btn btn-dark btn-sm"><i class="bi bi-download"></i> Export</button>
    </div>
</div>

{{-- TABLE --}}
<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Order</th>
                    <th>Customer</th>
                    <th>Instrument</th>
                    <th>Status</th>
                    <th>Received</th>
                    <th>Completed</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>

            <tbody>
                @php
                $statusColor = [
                'pending' => 'warning',
                'processing' => 'info',
                'completed' => 'success',
                'calibration' => 'danger',
                'waiting certificate' => 'primary',
                ];
                @endphp

                @forelse ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-semibold">{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->instrument }}</td>
                    <td>
                        <span class="badge bg-{{ $statusColor[strtolower($order->status)] ?? 'secondary' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->received_date }}</td>
                    <td>{{ $order->completed_date }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-secondary bg-white">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">
                        No orders available
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection