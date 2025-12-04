@extends('layouts.sales')

@section('content')
<div class="p-6">

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-4">Penjadwalan Order</h2>

    {{-- Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 shadow rounded">
            <p class="text-gray-500 text-sm">Orders Menunggu Jadwal</p>
            <h3 class="text-2xl font-bold">{{ $orders->count() }}</h3>
        </div>
    </div>

    <div class="bg-white shadow rounded p-4">
        <h3 class="text-xl font-semibold mb-4">Daftar Order Belum Dijadwalkan</h3>

        <table class="w-full table-auto border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Pelanggan</th>
                    <th class="p-2 border">Jumlah Alat</th>
                    <th class="p-2 border">Tanggal Masuk</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $o)
                    <tr>
                        <td class="border p-2">{{ $o->id }}</td>
                        <td class="border p-2">{{ $o->customer_name }}</td>
                        <td class="border p-2">{{ $o->jumlah_alat }}</td>
                        <td class="border p-2">{{ $o->tanggal_masuk }}</td>
                        <td class="border p-2">
                            <button onclick="openModal({{ $o->id }})"
                                class="bg-blue-500 text-white px-3 py-1 rounded">
                                Atur Jadwal
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
<div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white w-full max-w-lg p-6 rounded shadow">

        <h3 class="text-xl font-bold mb-4">Atur Jadwal Order</h3>

        <form action="{{ route('sales.scheduling.store') }}" method="POST">
            @csrf

            <input type="hidden" name="order_id" id="order_id">

            <label class="block mb-2">Jenis Pengantaran</label>
            <select name="pickup_type" class="w-full border p-2 rounded mb-4">
                <option value="pickup">Pickup</option>
                <option value="dropoff">Drop-off</option>
            </select>

            <label class="block mb-2">Tanggal Pickup/Drop-off</label>
            <input type="date" name="pickup_date" class="w-full border p-2 rounded mb-4">

            <label class="block mb-2">Waktu</label>
            <input type="time" name="pickup_time" class="w-full border p-2 rounded mb-4">

            <label class="block mb-2">Estimasi Mulai Kalibrasi</label>
            <input type="date" name="start_date" class="w-full border p-2 rounded mb-4">

            <label class="block mb-2">Estimasi Selesai</label>
            <input type="date" name="end_date" class="w-full border p-2 rounded mb-4">

            <label class="block mb-2">Penugasan Teknisi</label>
            <select name="teknisi_id" class="w-full border p-2 rounded mb-4">
                @foreach ($teknisi as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Catatan</label>
            <textarea name="catatan" class="w-full border p-2 rounded mb-4" rows="3"></textarea>

            <button class="bg-green-600 w-full text-white p-2 rounded">Simpan Jadwal</button>
        </form>

        <button onclick="closeModal()" class="mt-3 w-full bg-gray-500 text-white p-2 rounded">
            Batal
        </button>
    </div>
</div>

</div>

<script>
function openModal(id) {
    document.getElementById('order_id').value = id;
    document.getElementById('modal').classList.remove('hidden');
}
function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}
</script>

@endsection
