<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Bandwidth;
use App\Models\Routers;
use App\Models\Pool;
use Illuminate\Validation\Rule;
use App\Http\Controllers\MasterController;

class TambahPaketController extends masterController
{
    public function index(Request $request)
    {
        $notifPesans = $this -> pesanmasukIndex();
$notifPengajuans = $this ->pengajuanmasukIndex();
        $keyword = $request->keyword;
        $plans = Plan::where('status', 'LIKE','%'.$keyword.'%')
            ->orWhere('namapaket', 'LIKE','%'.$keyword.'%')
            ->orWhere('namabandwith', 'LIKE', '%'.$keyword.'%')
            ->orWhere('nama_router', 'LIKE', '%'.$keyword.'%')
            ->paginate(5);

        // Check if a specific parameter is present in the request
        if ($request->has('view') && $request->view == 'laporanharian') {
            // Load the Blade template for daily reports (laporanharian)
            return view('laporanharian', ['plans' => $plans, 'keyword' => $keyword, 'notifPesans'=> $notifPesans,'notifPengajuans'=> $notifPengajuans]);
        } else {
            // Load the default Blade template for the index (paketpppoe)
            return view('paketpppoe', ['plans' => $plans, 'keyword' => $keyword, 'notifPesans'=> $notifPesans,'notifPengajuans'=> $notifPengajuans]);
        }
    }

    
    public function create()
    {
        $notifPesans = $this -> pesanmasukIndex();
$notifPengajuans = $this ->pengajuanmasukIndex();
        $bandwidths = Bandwidth::pluck('name_bw', 'name_bw');
        $routers = Routers::pluck('name', 'name');
        $pools = Pool::pluck('pool_name', 'pool_name');

        return view('tambahpaketbaru', compact('bandwidths', 'routers', 'pools', 'notifPesans', 'notifPengajuans'));
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
        'masa_aktif_unit' => 'required', Rule::in(['menit','jam','hari','bulan']),
        'nama_router' => 'required|string',
        'ippol' => 'required|string',
    ]);

    // Simpan data ke dalam database
        Plan::create([
            'status' => $request->input('status'),
            'namapaket' => $request->input('namapaket'),
            'namabandwith' => $request->input('namabandwith'),
            'harga' => $request->input('harga'),
            'masa_aktif' => $request->input('masa_aktif'),
            'masa_aktif_unit' => $request->input('masa_aktif_unit'),
            'nama_router' => $request->input('nama_router'),
            'ippol' => $request->input('ippol'),
    ]);

    return redirect()->route('paketpppoe.index')->with('success', 'Paket baru berhasil ditambahkan');

    // Plan::create($request->all());

    // // Redirect atau tampilkan pesan sukses
    // return redirect()->route('tambahpaketbaru')->with('success', 'Paket berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        Plan::findOrFail($id)->delete();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('paketpppoe.index')->with('success', 'Paket berhasil dihapus');
    }

    //edit
    public function edit($id)
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        $plans = Plan::find($id);
    
        // Check if the record is not found
        if (!$plans) {
            return redirect()->route('paketpppoe.index')->with('error', 'Paket tidak ditemukan');
        }
    
        $bandwidths = Bandwidth::pluck('name_bw', 'name_bw');
        $routers = Routers::pluck('name', 'name');
        $pools = Pool::pluck('pool_name', 'pool_name');
        
        return view('editpaketpppoe', compact('plans', 'bandwidths', 'routers', 'pools', 'notifPesans', 'notifPengajuans'));
    }

    // Update
    public function update(Request $request, $id)
    {
        // Validasi input form di sini sesuai kebutuhan
        $request->validate([
            'status' => 'required|in:Enable,Disable',
            'namapaket' => 'required|string',
            'namabandwith' => 'required|string',
            'harga' => 'required|integer',
            'masa_aktif' => 'required|integer',
            'masa_aktif_unit' => 'required', Rule::in(['menit', 'jam', 'hari', 'bulan']),
            'nama_router' => 'required|string',
            'ippol' => 'required|string',
        ]);

        // Update data in the database
        $plan = Plan::findOrFail($id);
        $plan->update([
            'status' => $request->input('status'),
            'namapaket' => $request->input('namapaket'),
            'namabandwith' => $request->input('namabandwith'),
            'harga' => $request->input('harga'),
            'masa_aktif' => $request->input('masa_aktif'),
            'masa_aktif_unit' => $request->input('masa_aktif_unit'),
            'nama_router' => $request->input('nama_router'),
            'ippol' => $request->input('ippol'),
        ]);

        return redirect()->route('paketpppoe.index')
            ->with('success', 'Router berhasil diperbarui');
    }

}
