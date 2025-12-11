@extends('layouts.admin')

@section('content')

<div class="container-fluid px-3">

    {{-- HEADER --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
        <h4 class="fw-semibold m-0">Orders</h4>

        <a href="{{ route('admin.orders.create') }}" class="d-flex align-items-center font-bold w-100 w-md-auto">
            <i class="bi bi-plus-circle btn btn-white"></i> Order Manual
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
                    <a href="{{ route('admin.orders.export') }}">
                        <i class="bi bi-download "></i> Export
                    </a>
                </button>
            </div>
        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="card shadow-sm border-0">

        <div class="table-responsive px-0">
            <table class="table table-hover align-middle mb-0 text-nowrap">
                <thead class="table-light">
                    <tr class="text-dark">
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

                @php
                $statusColor = [
                'pending' => 'bg-yellow-500 text-white',
                'processing' => 'bg-blue-500 text-white',
                'completed' => 'bg-green-500 text-white',
                'calibration' => 'bg-red-500 text-white',
                'waiting certificate' => 'bg-purple-500 text-white',
                ];
                @endphp
                <tbody>

                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td class="fw-semibold">
                            <div class="d-block d-md-none">Order</div>
                            {{ $order->order_number }}
                        </td>

                        <td>
                            <div class="d-block d-md-none">Customer</div>
                            {{ $order->customer_name }}
                        </td>

                        <td>
                            <div class="d-block d-md-none">Instrument</div>
                            {{ $order->instrument }}
                        </td>

                        <td>
                            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusColor[strtolower($order->status)] }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>

                        <td>{{ $order->received_date }}</td>
                        <td>{{ $order->completed_date }}</td>

                        <td class="text-end">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-secondary btn-sm">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection