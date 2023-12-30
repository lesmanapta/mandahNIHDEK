<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/PaketController.php
use Carbon\Carbon;
use App\Models\Paket;
use App\Http\Controllers\MasterController;

class PaketController extends masterController
{
    public function index(){
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        $paket = Paket::orderBy('created_at', 'desc')->paginate(10);
        return view("pengajuanpasang",compact("paket", 'notifPengajuans', 'notifPesans'));
    }
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

        return redirect()->route('customers.index')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
        // Hapus data dari database
        Paket::destroy($id);

        return redirect()->route('pengajuanpasang.index')
            ->with('success', 'Router berhasil dihapus');
    }


    
}
