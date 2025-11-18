@extends('layouts.admin')

@section('content')
<div class="container orders-container">

    <h2 class="mb-3">Orders Management</h2>

    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary btn-add-order">
        + Tambah Order Manual
    </a>

    <div class="orders-card">
        <div class="orders-card-header">
            Daftar Order
        </div>

        <div class="p-0">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Customer</th>
                        <th>Instrument</th>
                        <th>Status</th>
                        <th>Received Date</th>
                        <th>Completed Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->instrument }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status == 'Pending') bg-secondary
                                    @elseif($order->status == 'Processing') bg-info
                                    @elseif($order->status == 'Calibration') bg-warning
                                    @elseif($order->status == 'Waiting Certificate') bg-primary
                                    @elseif($order->status == 'Completed') bg-success
                                    @endif">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td>{{ $order->received_date }}</td>
                            <td>{{ $order->completed_date }}</td>
                            <td>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning btn-sm orders-action-btn">Edit</a>

                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus order ini?')" class="btn btn-danger btn-sm orders-action-btn">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center orders-empty">No orders available</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
