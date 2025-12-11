@extends('layouts.admin')

@section('content')

<div class="container-fluid px-3">

    {{-- HEADER --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
        <h4 class="fw-semibold m-0">Orders</h4>

        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary w-100 w-md-auto">
            <i class="bi bi-plus-circle"></i> Order Manual
        </a>
    </div>

    {{-- FILTERS --}}
    <div class="card border-0 shadow-sm p-3 mb-3">

        <div class="d-flex flex-wrap gap-2">

            {{-- FILTER BUTTONS --}}
            <button class="btn btn-outline-secondary btn-sm flex-grow-1">Type</button>
            <button class="btn btn-outline-secondary btn-sm flex-grow-1">Status</button>
            <button class="btn btn-outline-secondary btn-sm flex-grow-1">Order Date</button>
            <button class="btn btn-outline-secondary btn-sm flex-grow-1">All Filters</button>

            {{-- IMPORT / EXPORT --}}
            <div class="d-flex gap-2 w-100 mt-2">
                <button class="btn btn-dark btn-sm w-50">
                    <i class="bi bi-upload"></i> Import
                </button>
                <button class="btn btn-dark btn-sm w-50">
                    <i class="bi bi-download"></i> Export
                </button>
            </div>
        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="card shadow-sm border-0">
        <div class="table-responsive px-2">

            <table class="table align-middle mb-0">
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
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-secondary btn-sm bg-white">
                                View
                            </a>
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

</div>

@endsection
