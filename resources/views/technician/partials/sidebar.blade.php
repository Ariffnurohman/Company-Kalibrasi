<div class="d-flex flex-column p-3 bg-light border-end" style="height: 100vh; width: 250px;">

    <h5 class="text-center fw-bold mb-4">Technician Panel</h5>

    <ul class="nav nav-pills flex-column mb-auto">

        {{-- DASHBOARD --}}
        <li class="nav-item mb-2">
            <a href="{{ route('technician.dashboard') }}"
                class="nav-link {{ request()->routeIs('technician.dashboard') ? 'active' : 'link-dark' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        {{-- ORDERS COLLAPSE --}}
        <li class="nav-item mb-2">
            <a class="nav-link link-dark d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse" href="#collapseOrders" role="button">
                <span><i class="bi bi-tools me-2"></i> Orders</span>
                <i class="bi bi-chevron-down small"></i>
            </a>

            <div class="collapse ps-4" id="collapseOrders">
                <ul class="nav flex-column">
                    <li class="nav-item mb-1">
                        <a href="/technician/orders" class="nav-link link-dark small">Assigned Orders</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link link-dark small">In Progress</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link link-dark small">Completed</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- HISTORY COLLAPSE --}}
        <li class="nav-item mb-2">
            <a class="nav-link link-dark d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse" href="#collapseHistory" role="button">
                <span><i class="bi bi-clock-history me-2"></i> History</span>
                <i class="bi bi-chevron-down small"></i>
            </a>

            <div class="collapse ps-4" id="collapseHistory">
                <ul class="nav flex-column">
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link link-dark small">Calibration History</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link link-dark small">Completed Jobs</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>

    <hr>

    <div class="mt-auto">
        <a href="/logout" class="btn btn-outline-danger w-100">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
    </div>

</div>
