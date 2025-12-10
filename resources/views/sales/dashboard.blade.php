@extends('layouts.sales')

@section('title', 'Dashboard Sales')

@section('content')
<div class="container py-4">

    <h3 class="mb-4 fw-bold">Halo, {{ auth()->user()->name }}</h3>

    {{-- STAT CARDS --}}
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h6 class="text-secondary mb-1">Total Pickup</h6>
                    <p class="fs-2 fw-bold text-primary">{{ $totalPickups }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h6 class="text-secondary mb-1">Pending</h6>
                    <p class="fs-2 fw-bold text-warning">{{ $pendingPickups }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h6 class="text-secondary mb-1">Completed</h6>
                    <p class="fs-2 fw-bold text-success">{{ $completedPickups }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- RECENT PICKUPS --}}
    <div class="card shadow-sm border-0 rounded-3 mt-5">
        <div class="card-header bg-white border-0">
            <h5 class="fw-bold mb-0">Riwayat Pickup Terbaru</h5>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order</th>
                        <th>Tanggal Pickup</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPickups as $p)
                        <tr>
                            <td>{{ $p->order->order_number ?? '-' }}</td>
                            <td>{{ $p->pickup_date ?? '-' }}</td>
                            <td>
                                <span class="badge 
                                    @if($p->status == 'pending') bg-warning text-dark
                                    @elseif($p->status == 'completed') bg-success
                                    @else bg-secondary @endif">
                                    {{ ucfirst($p->status ?? '-') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-3">
                            Belum ada riwayat pickup.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
