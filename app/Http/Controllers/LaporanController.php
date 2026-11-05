<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::latest()->paginate(5);
        return view('laporans.index', compact('laporans'));
    }

    public function show(Laporan $laporan)
    {
        return view('laporans.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('laporans.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:15',
            'lokasi'       => 'required|string|max:255',
            'kecamatan'    => 'required|string|max:255',
            'tinggi_air'   => 'required|integer|min:0|max:1000',
            'keterangan'   => 'nullable|string',
            'status'       => 'required|in:Menunggu,Diproses,Selesai',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        unset($validated['foto']); 

        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto); 
            }
            $validated['foto'] = $request->file('foto')->store('foto_laporan', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto); 
        }
        $laporan->delete();

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}