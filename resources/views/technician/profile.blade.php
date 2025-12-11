@extends('layouts.technician')

@section('content')

<div class="max-w-3xl mx-auto">

    {{-- PAGE TITLE --}}
    <h2 class="text-2xl font-semibold mb-6">Technician Profile</h2>

    {{-- CARD --}}
    <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-100">

        {{-- FORM --}}
        <form action="{{ route('technician.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- PROFILE PHOTO --}}
            <div class="flex items-center gap-6">
                <div class="avatar">
                    <div class="w-28 h-28 rounded-full ring ring-primary ring-offset-2 overflow-hidden">
                        <img src="{{ Auth::user()->profile_photo ?? '/default-avatar.png' }}" alt="Profile Photo">
                    </div>
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-1">Change Photo</label>
                    <input type="file" name="photo" class="file-input file-input-bordered w-full max-w-xs">
                </div>
            </div>

            {{-- NAME --}}
            <div class="mt-6">
                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}"
                       class="input input-bordered w-full" required>
            </div>

            {{-- EMAIL READONLY --}}
            <div class="mt-6">
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" value="{{ Auth::user()->email }}"
                       class="input input-bordered w-full bg-gray-100 cursor-not-allowed" readonly>
            </div>

            {{-- PHONE --}}
            <div class="mt-6">
                <label class="block text-gray-700 font-medium mb-1">Phone Number</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}"
                       class="input input-bordered w-full" placeholder="0812xxxxxxx">
            </div>

            {{-- SPECIALIZATION (JIKA ADA) --}}
            <div class="mt-6">
                <label class="block text-gray-700 font-medium mb-1">Specialization</label>
                <input type="text" name="specialization" value="{{ Auth::user()->specialization ?? '' }}"
                       class="input input-bordered w-full" placeholder="Electrical, Mechanical, Calibration, etc.">
            </div>

            {{-- BUTTON --}}
            <div class="mt-8 flex justify-end">
                <button type="submit" class="btn btn-primary px-6">
                    Update Profile
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
