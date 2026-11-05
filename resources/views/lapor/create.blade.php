<x-guest-layout>
    <h1 class="text-xl font-semibold text-gray-800 mb-1">LaporBanjir BPBD Kab. Bandung</h1>
    <p class="text-sm text-gray-600 mb-4">Laporkan kejadian banjir beserta foto buktinya.</p>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700 text-sm">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-700 text-sm">
            Data belum valid, periksa kembali isian form.
        </div>
    @endif

    <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('laporans._form')

        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 underline">Login Petugas</a>
            <x-primary-button>Kirim Laporan</x-primary-button>
        </div>
    </form>
</x-guest-layout>