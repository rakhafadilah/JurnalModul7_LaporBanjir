<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function create()
    {
        return view('lapor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:15',
            'lokasi'       => 'required|string|max:255',
            'kecamatan'    => 'required|string|max:255',
            'tinggi_air'   => 'required|integer|min:0|max:1000',
            'keterangan'   => 'nullable|string',
            'foto'         => 'required|image|mimes:jpg,jpeg,png|max:2048', 
        ]);

        $validated['foto'] = $request->file('foto')->store('foto_laporan', 'public');

        Laporan::create($validated); 

        return redirect()->route('lapor.create')
            ->with('success', 'Laporan berhasil dikirim. Terima kasih, petugas akan segera menindaklanjuti.');
    }
}