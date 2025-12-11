@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- TITLE --}}
    <h2 class="text-2xl font-bold mb-6">Daftar Permintaan Pickup (Pending)</h2>

    {{-- FILTER & SEARCH --}}
    <form method="GET" class="mb-4">
        <div class="flex flex-col md:flex-row items-center gap-3">

            {{-- SEARCH --}}
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari order / sales..."
                   class="input input-bordered w-full md:w-64" />

            {{-- FILTER STATUS --}}
            <select name="status" class="select select-bordered w-full md:w-40">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>

            <button class="btn btn-primary">
                <i class="bi bi-search mr-2"></i> Cari
            </button>
        </div>
    </form>

    {{-- TABLE PENDING --}}
    <div class="overflow-x-auto bg-white p-4 rounded-xl shadow-md">
        <table class="table w-full">
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
                    <td>
                        <span class="badge badge-warning text-white">Pending</span>
                    </td>

                    <td class="flex gap-2">

                        {{-- APPROVE --}}
                        <form method="POST" action="{{ route('admin.pickups.approve', $item->id) }}">
                            @csrf
                            <button class="btn btn-success btn-sm">
                                <i class="bi bi-check-lg mr-1"></i> Approve
                            </button>
                        </form>

                        {{-- REJECT --}}
                        <form method="POST" action="{{ route('admin.pickups.reject', $item->id) }}">
                            @csrf
                            <button class="btn btn-error btn-sm">
                                <i class="bi bi-x-lg mr-1"></i> Reject
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500">Tidak ada pickup pending.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>


    {{-- HISTORY SECTION --}}
    <h2 class="text-2xl font-bold mt-10 mb-4">Riwayat Pengambilan Alat</h2>

    <div class="overflow-x-auto bg-white p-4 rounded-xl shadow-md">

        <table class="table w-full ">
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
                        @if($item->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif($item->status == 'approved')
                            <span class="badge badge-success">Approved</span>
                        @elseif($item->status == 'rejected')
                            <span class="badge badge-error">Rejected</span>
                        @else
                            <span class="badge badge-neutral">Unknown</span>
                        @endif
                    </td>

                    <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                </tr>

                @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-500">Belum ada riwayat pickup.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>
@endsection