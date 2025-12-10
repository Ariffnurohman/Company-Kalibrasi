@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <h3>Daftar Permintaan Pickup (Pending)</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order</th>
                <th>Sales</th>
                <th>Tanggal Pickup</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendingPickups as $item)
            <tr>
                <td>{{ $item->order->order_number ?? 'Order dihapus' }}</td>
                <td>{{ $item->sales->name ?? '-' }}</td>
                <td>{{ $item->pickup_date }}</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>
                    <div class="d-flex gap-2">

                        <!-- APPROVE FORM -->
                        <form method="POST" action="{{ route('admin.pickups.approve', $item->id) }}">
                            @csrf
                            <button class="btn btn-success btn-sm">
                                Approve
                            </button>
                        </form>

                        <!-- REJECT FORM -->
                        <form method="POST" action="{{ route('admin.pickups.reject', $item->id) }}">
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                Reject
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada pickup pending.</td>
            </tr>
            @endforelse
        </tbody>
    </table>


    <h4 class="mb-3 mt-5">Riwayat Pengambilan Alat</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Order</th>
                <th>Sales</th>
                <th>Tanggal Pickup</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Dibuat Pada</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($history as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->order->order_number ?? 'Order dihapus' }}</td>
                <td>{{ $item->sales->name ?? '-' }}</td>
                <td>{{ $item->pickup_date }}</td>
                <td>{{ $item->notes ?? '-' }}</td>

                <td>
                    <span class="badge 
        @if($item->status == 'pending') bg-warning
        @elseif($item->status == 'approved') bg-success
        @elseif($item->status == 'rejected') bg-danger
        @else bg-secondary @endif">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada riwayat pickup.</td>
            </tr>
            @endforelse
        </tbody>
    </table>


</div>
@endsection