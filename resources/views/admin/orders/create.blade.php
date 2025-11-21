@extends('layouts.admin')

@section('title', 'Create Order')

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Create New Order</h2>
    </div>

    {{-- Card Container --}}
    <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-100">

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 px-4 py-3 rounded-md mb-5 border border-red-200">
                <ul class="list-disc ml-6">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('admin.orders.store') }}" method="POST">
            @csrf

            {{-- Row 1 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Customer Name --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Customer Name</label>
                    <input type="text" name="customer_name" class="w-full mate-input"
                        placeholder="Enter customer name" required>
                </div>

                {{-- Instrument --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Instrument</label>
                    <input type="text" name="instrument" class="w-full mate-input"
                        placeholder="Ex: Micrometer, Caliper" required>
                </div>

            </div>

            {{-- Row 2 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                {{-- Status --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="status" class="w-full mate-input" required>
                        <option value="Pending">Pending</option>
                        <option value="On Progress">On Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                {{-- Received Date --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Received Date</label>
                    <input type="date" name="received_date" value="{{ date('Y-m-d') }}"
                        class="w-full mate-input">
                </div>

            </div>

            {{-- Notes --}}
            <div class="mt-6">
                <label class="block text-gray-700 font-medium mb-1">Notes (optional)</label>
                <textarea name="notes" class="w-full mate-input h-32"
                    placeholder="Add order notes if needed..."></textarea>
            </div>

            {{-- CTA Buttons --}}
            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('admin.orders.index') }}"
                    class="mate-btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="mate-btn-primary">
                    Create Order
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
