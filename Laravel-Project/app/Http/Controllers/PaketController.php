<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/PaketController.php

use App\Models\Paket;

class PaketController extends Controller
{
    // Your controller methods go here
    public function store(Request $request)
    {
        $request->validate([
            'jenis_paket' => 'required|in:5mb,10mb,20mb',
            'email' => 'required|email',
            'nama' => 'required|string',
            'nomor_hp' => 'required|numeric',
            'alamat' => 'required|string',
        ]);

        // Simpan data pendaftaran dan jenis paket ke dalam database
        Paket::create($request->all());

        // Tambahkan logika untuk menyimpan data pendaftaran ke dalam database sesuai kebutuhan

        return redirect()->route('home')->with('success', 'Data berhasil disimpan!');
    }
}
