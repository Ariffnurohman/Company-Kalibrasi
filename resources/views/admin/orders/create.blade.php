@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8 space-y-8">

    {{-- TITLE --}}
    <h2 class="text-2xl font-bold text-gray-800">Create New Order</h2>

    <form action="{{ route('admin.orders.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- GRID 1 --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Customer Name</span>
                </label>
                <input type="text" name="customer_name" placeholder="Enter customer name" required
                    class="input input-bordered w-full" />
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Instrument</span>
                </label>
                <input type="text" name="instrument" placeholder="Enter instrument" required
                    class="input input-bordered w-full" />
            </div>
        </div>

        {{-- GRID 2 --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Status</span>
                </label>
                <select name="status" required class="select select-bordered w-full">
                    <option value="">Select status</option>
                    <option value="Pending">Pending</option>
                    <option value="On Progress">On Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Received Date</span>
                </label>
                <input type="date" name="received_date" value="{{ date('Y-m-d') }}"
                    class="input input-bordered w-full" />
            </div>
        </div>

        {{-- NOTES --}}
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text font-semibold">Notes (optional)</span>
            </label>
            <textarea name="notes" rows="4" placeholder="Enter notes..." class="textarea textarea-bordered w-full"></textarea>
        </div>

        {{-- BUTTONS --}}
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                Create Order
            </button>
        </div>
    </form>
</div>
@endsection
