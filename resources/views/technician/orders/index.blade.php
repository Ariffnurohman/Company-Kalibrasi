@extends('layouts.technician')

@section('content')

<div class="bg-base-100 rounded-xl shadow p-4">

    {{-- Header --}}
    <div class="border-b pb-3 mb-4">
        <h2 class="text-xl font-bold">Technician Orders</h2>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr class="text-sm text-gray-300">
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
                        <span class="badge 
                            @if($o->status=='Completed') badge-success
                            @elseif($o->status=='Calibration') badge-warning
                            @elseif($o->status=='Processing') badge-info
                            @else badge-neutral
                            @endif
                        ">
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

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $orders->links() }}
        </div>

    </div>

</div>

@endsection
