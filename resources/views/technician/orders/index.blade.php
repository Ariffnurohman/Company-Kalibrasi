@extends('layouts.technician')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-bold">
        Technician Orders
    </div>

    <div class="table-responsive p-3">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Instrument</th>
                    <th>Status</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $o)
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
                    <td>
                        <a href="{{ route('technician.orders.show', $o->id) }}"
                           class="btn btn-sm btn-primary">
                            <i class="bi bi-eye"></i> View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $orders->links() }}
        </div>
    </div>
</div>

@endsection
