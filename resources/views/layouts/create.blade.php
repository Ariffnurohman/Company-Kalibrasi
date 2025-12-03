{{-- resources/views/layouts/admin-form.blade.php --}}
@extends('layouts.admin')

@section('content')
<style>

.form-group {
    position: relative;
    margin-bottom: 22px;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px 12px 12px 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    font-size: 15px;
    background: transparent;
}

.form-group textarea {
    min-height: 80px;
}

.form-group label {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 0 4px;
    background: white;
    transition: 0.2s ease;
    color: #888;
    pointer-events: none;
}

/* Floating Effect */
.form-group input:focus + label,
.form-group input:not(:placeholder-shown) + label,
.form-group textarea:focus + label,
.form-group textarea:not(:placeholder-shown) + label,
.form-group select:focus + label,
.form-group select:not([value=""]) + label {
    top: -9px;
    font-size: 12px;
    color: #007bff;
}
</style>

</style>
<div class="max-w-5xl mx-auto py-8">

    {{-- Page Title --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">{{ $title ?? 'Form' }}</h1>
        @isset($subtitle)
            <p class="text-gray-500 mt-1">{{ $subtitle }}</p>
        @endisset
    </div>
    {{-- Card Container --}}
    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8">

        {{-- Error Alerts --}}
        @if ($errors->any())
            <div class="bg-red-50 text-red-700 border border-red-200 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc ml-5 text-sm">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Dynamic Content --}}
        <div>
            @yield('form')
        </div>

    </div>

</div>

@endsection
