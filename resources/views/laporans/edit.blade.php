<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Laporan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('laporans.update', $laporan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('laporans._form', ['showStatus' => true])

                    <x-primary-button>Update</x-primary-button>
                    <a href="{{ route('laporans.index') }}" class="ms-3 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>