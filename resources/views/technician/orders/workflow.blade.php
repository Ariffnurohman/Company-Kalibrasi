@extends('layouts.technician')

@section('content')
<div class="container py-4">

    <a href="{{ route('technician.orders.show', $order->id) }}" class="btn btn-secondary mb-3">
        ← Kembali ke Detail Order
    </a>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Workflow Kalibrasi — {{ $order->order_number }}</h5>
        </div>

            {{-- STATUS ORDER --}}
            <div class="mb-4 p-3 border rounded" style="background: #f8f9fa">
                <h6 class="fw-bold mb-2">Status Pengerjaan</h6>
                <p class="mb-1">Nama Alat: <strong>{{ $order->instrument }}</strong></p>
                <p class="mb-0">Status Saat Ini:  
                    <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                </p>
            </div>

            {{-- FORM WORKFLOW --}}
            <form action="{{ route('technician.orders.workflow.store', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Progress / Catatan Kalibrasi</label>
                    <textarea name="progress" rows="5" class="form-control" placeholder="Tulis catatan pengerjaan teknisi...">{{ old('progress', $order->workflow_notes) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Upload File (Opsional)</label>
                    <input type="file" name="file" class="form-control">
                    <small class="text-muted">Format: PDF, JPG, PNG — Max 2MB</small>
                </div>

                @if ($order->workflow_file)
                <div class="mb-3">
                    <p class="fw-bold mb-1">File Sebelumnya:</p>
                    <a href="{{ asset('storage/' . $order->workflow_file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        Lihat File Lama
                    </a>
                </div>
                @endif

                <button class="btn btn-primary w-100">Simpan Workflow</button>
            </form>

        </div>
    </div>
</div>
@endsection
