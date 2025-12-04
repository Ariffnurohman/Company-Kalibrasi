@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">

    <h3 class="fw-bold mb-4">Admin Dashboard</h3>

    <!-- ===================== SUMMARY CARDS ===================== -->
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-sm p-3 border-0 rounded-4" style="background:#4e73df; color:white;">
                <h6>Total Orders</h6>
                <h2 class="fw-bold">{{ $totalOrders }}</h2>
                <i class="bi bi-bag-check-fill fs-1 opacity-50 position-absolute end-0 bottom-0 me-3 mb-3"></i>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm p-3 border-0 rounded-4" style="background:#36b9cc; color:white;">
                <h6>Completed Orders</h6>
                <h2 class="fw-bold">{{ $completedOrders }}</h2>
                <i class="bi bi-check2-circle fs-1 opacity-50 position-absolute end-0 bottom-0 me-3 mb-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-3 border-0 rounded-4" style="background:#f6c23e; color:white;">
                <h6>Pending Orders</h6>
                <h2 class="fw-bold">{{ $pendingOrders }}</h2>
                <i class="bi bi-hourglass-top fs-1 opacity-50 position-absolute end-0 bottom-0 me-3 mb-3"></i>
            </div>
        </div>
    </div>

    <!-- ===================== RECENT ORDERS TABLE ===================== -->
    <div class="card shadow-sm mt-5 p-4 border-0 rounded-4">
        <h6 class="fw-bold mb-3">Recent Orders</h6>

        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
            @php
                $statusColor = [
                'pending' => 'warning',
                'processing' => 'info',
                'completed' => 'success',
                'calibration' => 'danger',
                'waiting certificate' => 'primary',
                ];
                @endphp

                @foreach ($recentOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>
                        <span class="badge bg-{{ $statusColor[strtolower($order->status)] ?? 'secondary' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
 
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // ====== DATA PHP → JS ======
    const months      = @json($months);
    const ordersData  = @json($ordersChart);
    const revenueData = @json($revenueChart);

    // ====== ORDERS CHART ======
    new Chart(document.getElementById("ordersChart"), {
        type: "line",
        data: {
            labels: months,
            datasets: [{
                label: "Orders",
                data: ordersData,
                fill: true,
                borderWidth: 3,
            }]
        }
    });

    // ====== REVENUE CHART ======
    new Chart(document.getElementById("revenueChart"), {
        type: "bar",
        data: {
            labels: months,
            datasets: [{
                label: "Revenue",
                data: revenueData,
                borderWidth: 1
            }]
        }
    });
</script>

@endsection
