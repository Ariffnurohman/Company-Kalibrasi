@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto">

    {{-- PAGE TITLE --}}
    <h2 class="text-2xl font-semibold mb-6">Profile Admin</h2>

    {{-- CARD --}}
    <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-100">

        {{-- FORM --}}
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- PROFILE PHOTO --}}
            <div class="flex items-center gap-6">

                {{-- Avatar Preview --}}
                <div class="avatar">
                    <div class="w-28 h-28 rounded-full ring ring-primary ring-offset-2 overflow-hidden">
                        <img 
                            id="preview-image"
                            src="{{ Auth::user()->profile_photo 
                                ? asset('storage/' . Auth::user()->profile_photo) 
                                : asset('default-avatar.png') }}"
                            alt="Profile Photo">
                    </div>
                </div>

                {{-- Upload Input --}}
                <div>
                    <label class="block font-medium text-gray-700 mb-1">Change Photo</label>
                    <input 
                        type="file" 
                        name="photo" 
                        accept="image/*"
                        class="file-input file-input-bordered w-full max-w-xs"
                        onchange="previewImage(event)"
                    >
                    <p class="text-xs text-gray-500 mt-1">
                        Format: JPG, JPEG, PNG — Max 2MB
                    </p>
                </div>
            </div>

            {{-- NAME --}}
            <div class="mt-6">
                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ Auth::user()->name }}"
                    class="input input-bordered w-full" 
                    required>
            </div>

            {{-- EMAIL (READ ONLY) --}}
            <div class="mt-6">
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input 
                    type="email" 
                    value="{{ Auth::user()->email }}"
                    class="input input-bordered w-full bg-gray-100 cursor-not-allowed"
                    readonly>
            </div>

            {{-- PHONE --}}
            <div class="mt-6">
                <label class="block text-gray-700 font-medium mb-1">Phone Number</label>
                <input 
                    type="text" 
                    name="phone" 
                    value="{{ Auth::user()->phone }}"
                    class="input input-bordered w-full"
                    placeholder="0812xxxxxxx">
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

{{-- Preview Script --}}
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const preview = document.getElementById('preview-image');
        preview.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
        