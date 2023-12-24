<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Bandwidth;
use App\Models\Routers;
use App\Models\Pool;

class TambahPaketController extends Controller
{
    public function index()
    {
    $plans = Plan::all(); // Fetch all plans from the database

    return view('paketpppoe', compact('plans'));
    }
    public function create()
    {
        $bandwidths = Bandwidth::pluck('name_bw', 'name_bw');
        $routers = Routers::pluck('name', 'name');
        $pools = Pool::pluck('pool_name', 'pool_name');

        return view('tambahpaketbaru', compact('bandwidths', 'routers', 'pools'));
    }

    public function store(Request $request)
    {
    // Validasi input form di sini sesuai kebutuhan
    $request->validate([
        'status' => 'required|in:Enable,Disable',
        'namapaket' => 'required|string',
        'namabandwith' => 'required|string',
        'harga' => 'required|integer',
        'masa_aktif' => 'required|integer',
        'masa_aktif_unit' => 'required|in:menit,jam,hari,bulan',
        'nama_router' => 'required|string',
        'ippol' => 'required|string',
    ]);

    // Simpan data ke dalam database
    Plan::create($request->all());

    // Redirect atau tampilkan pesan sukses
    return redirect()->route('tambahpaketbaru')->with('success', 'Paket berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        Plan::destroy($id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('paketpppoe')->with('success', 'Paket berhasil dihapus');
    }
}
