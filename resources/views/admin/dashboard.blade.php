@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Welcome, Admin!</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-xl shadow">
        <p>Total Orders</p>
        <h1 class="text-3xl font-bold">{{ $totalOrders }}</h1>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p>Completed</p>
        <h1 class="text-3xl font-bold">{{ $completedOrders }}</h1>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p>Pending</p>
        <h1 class="text-3xl font-bold">{{ $totalOrders - $completedOrders }}</h1>
    </div>

</div>

<div class="bg-white mt-8 p-6 rounded-xl shadow">
    <h2 class="text-lg font-bold mb-3">Monthly Orders</h2>

    <canvas id="salesChart" height="100"></canvas>

    <script>
        const chartLabels = {!! json_encode(array_keys($salesData->toArray())) !!};
        const chartValues = {!! json_encode(array_values($salesData->toArray())) !!};

        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Orders',
                    data: chartValues,
                    borderWidth: 3
                }]
            }
        });
    </script>
</div>

<div class="bg-white mt-8 p-6 rounded-xl shadow">
    <h2 class="text-lg font-bold mb-3">Latest Orders</h2>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Order #</th>
                <th class="p-2">Customer</th>
                <th class="p-2">Instrument</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($latestOrders as $order)
            <tr>
                <td class="p-2">{{ $order->order_number }}</td>
                <td class="p-2">{{ $order->customer_name }}</td>
                <td class="p-2">{{ $order->instrument }}</td>
                <td class="p-2">{{ $order->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
