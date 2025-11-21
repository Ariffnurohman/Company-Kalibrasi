<div class="sidebar bg-white shadow-sm p-3" style="width:260px;">
    <h4 class="fw-bold mb-4">Technician</h4>

    <a href="{{ route('technician.dashboard') }}" class="d-block mb-3 text-dark">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>

    <a href="{{ route('technician.orders.index') }}" class="d-block mb-3 text-dark">
        <i class="bi bi-clipboard-check me-2"></i> My Orders
    </a>

    <a href="/logout" class="d-block text-danger mt-4">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
</div>
