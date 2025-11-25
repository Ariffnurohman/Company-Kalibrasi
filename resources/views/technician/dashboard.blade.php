@extends('layouts.technician')

@section('content')

<div class="row g-3">

    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h6 class="text-muted">Assigned Orders</h6>
            <h2 class="fw-bold">{{ $assignedOrders }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h6 class="text-muted">In Progress</h6>
            <h2 class="fw-bold text-primary">{{ $inProgress }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h6 class="text-muted">Completed</h6>
            <h2 class="fw-bold text-success">{{ $completed }}</h2>
        </div>
    </div>
</div>

<div class="card mt-4 shadow-sm border-0">
    <div class="card-header bg-white fw-bold">Recent Orders</div>

    <div class="table-responsive p-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Instrument</th>
                    <th>Status</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $o)
                <tr>
                    <td>{{ $o->order_number }}</td>
                    <td>{{ $o->instrument }}</td>
                    <td>
                        <span class="badge bg-{{ 
                            $o->status == 'Completed' ? 'success' : 
                            ($o->status == 'Calibration' ? 'warning' : 
                            ($o->status == 'Processing' ? 'primary' : 'secondary'))
                        }}">
                            {{ $o->status }}
                        </span>
                    </td>
                    <td>{{ $o->updated_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
