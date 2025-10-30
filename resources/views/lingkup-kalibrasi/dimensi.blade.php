@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Kalibrasi Dimensi</h2>
        <p class="text-muted">Layanan kalibrasi untuk alat ukur dimensi.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="list-group shadow-lg">
                
                <li class="list-group-item" style="font-weight: bold;">Outside Micrometer<br>
                <img src="{{ asset('images/img/micrometer-outside.jpg') }}" alt="Outside Micrometer" width="120">
            </li>
            <li class="list-group-item" style="font-weight: bold;">Caliper<br>
            <img src="{{ asset('images/img/caliper.png') }}" alt="Outside Micrometer" width="120">
        </li>
                <li class="list-group-item" style="font-weight: bold;">Thickness Gauge<br>
                <img src="{{ asset('images/img/thickness.png') }}" alt="Thickness Gauge" width="120">
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
