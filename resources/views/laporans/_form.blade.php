@php
    $laporan = $laporan ?? null;
    $showStatus = $showStatus ?? false;
@endphp

<div class="mb-4">
    <x-input-label for="nama_pelapor" value="Nama Pelapor" />
    <x-text-input id="nama_pelapor" name="nama_pelapor" type="text" class="mt-1 block w-full"
        :value="old('nama_pelapor', $laporan->nama_pelapor ?? '')" required />
    <x-input-error :messages="$errors->get('nama_pelapor')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="no_hp" value="No HP" />
    <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
        :value="old('no_hp', $laporan->no_hp ?? '')" required />
    <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="lokasi" value="Lokasi / Alamat Banjir" />
    <x-text-input id="lokasi" name="lokasi" type="text" class="mt-1 block w-full"
        :value="old('lokasi', $laporan->lokasi ?? '')" required />
    <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="kecamatan" value="Kecamatan" />
    <x-text-input id="kecamatan" name="kecamatan" type="text" class="mt-1 block w-full"
        :value="old('kecamatan', $laporan->kecamatan ?? '')" required />
    <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="tinggi_air" value="Tinggi Air (cm)" />
    <x-text-input id="tinggi_air" name="tinggi_air" type="number" min="0" class="mt-1 block w-full"
        :value="old('tinggi_air', $laporan->tinggi_air ?? '')" required />
    <x-input-error :messages="$errors->get('tinggi_air')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="keterangan" value="Keterangan (opsional)" />
    <textarea id="keterangan" name="keterangan" rows="3"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('keterangan', $laporan->keterangan ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
</div>

@if ($showStatus)
    <div class="mb-4">
        <x-input-label for="status" value="Status Penanganan" />
        <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @foreach (['Menunggu', 'Diproses', 'Selesai'] as $s)
                <option value="{{ $s }}" @selected(old('status', $laporan->status ?? 'Menunggu') === $s)>{{ $s }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>
@endif

<div class="mb-4">
    @if ($laporan && $laporan->foto)
        <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
        <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto banjir" class="w-40 rounded border mb-2">
    @endif
    <x-input-label for="foto"
        :value="$laporan ? 'Ganti Foto (kosongkan jika tidak ingin mengganti)' : 'Foto Kondisi Banjir (jpg, jpeg, png - maks. 2 MB)'" />
    <input id="foto" name="foto" type="file" accept="image/*" class="mt-1 block w-full"
        {{ $laporan ? '' : 'required' }}>
    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
</div>