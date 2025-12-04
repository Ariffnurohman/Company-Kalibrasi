@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h3 class="fw-bold mb-4">Pengambilan Alat Sales</h3>

    @if($pickups->isEmpty())
    <p class="text-gray-500">Belum ada pengambilan alat.</p>
    @else
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Sales</th>
                <th>Customer</th>
                <th>Alat</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pickups as $pickup)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pickup->sales->name }}</td>
                <td>{{ $pickup->customer }}</td>
                <td>{{ $pickup->equipment }}</td>
                <td>{{ $pickup->pickup_date }}</td>
                <td>
                    <span class="badge bg-{{ $pickup->status == 'pending' ? 'warning' : ($pickup->status == 'approved' ? 'success' : 'danger') }}">
                        {{ ucfirst($pickup->status) }}
                    </span>
                </td>
                <td>
                    @if($pickup->status == 'pending')
                    {{-- Approve --}}
                    <form action="{{ route('admin.pickup.approve', $pickup->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                    </form>

                    <form action="{{ route('admin.pickup.reject', $pickup->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                    </form>
                    @else
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection