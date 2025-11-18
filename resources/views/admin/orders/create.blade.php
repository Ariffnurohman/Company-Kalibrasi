@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Tambah Order Manual</h3>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.orders.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Instrument</label>
                    <input type="text" name="instrument" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Pending">Pending</option>
                        <option value="Processing">Processing</option>
                        <option value="Calibration">Calibration</option>
                        <option value="Waiting Certificate">Waiting Certificate</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Received Date</label>
                    <input type="date" name="received_date" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Order</button>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Batal</a>

            </form>

        </div>
    </div>

</div>
@endsection
