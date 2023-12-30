<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Bandwidth;
use App\Models\Routers;
use App\Models\Pool;
use Illuminate\Validation\Rule;

class TambahPaketController extends Controller
{
    public function index(Request $request)
    {
    // $plans = Plan::all(); // Fetch all plans from the database
    $keyword = $request->keyword;
    $plans = Plan::where('status', 'LIKE','%'.$keyword.'%')
    ->orWhere('namapaket', 'LIKE','%'.$keyword.'%')
    ->orWhere('namabandwith', 'LIKE', '%'.$keyword.'%')
    ->orWhere('nama_router', 'LIKE', '%'.$keyword.'%')
    ->paginate(5);

    return view('paketpppoe', ['plans' => $plans, 'keyword' => $keyword]);
    // return view('paketpppoe', compact('plans'));
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
    $router = Plan::findorFail($id);
    return view ('editPaketPPPoE', compact('plan'));
    }

    // public function update(Request $request, $id)
    // {
    //     // Validasi input jika diperlukan
    //     $request->validate([
    //         'name' => 'required|string',
    //         'ip_address' => 'required|string',
    //         'username' => 'required|unique:routers,username,' . $id,
    //         'password' => 'required|string',
    //         'deskripsi' => 'nullable|string',
    //         'status' => ['required', Rule::in(['Enable', 'Disable'])],
    //     ]);

    //     $router = Routers::findOrFail($id);

    //     // Update data in the database
    //     $router->update([
    //         'name' => $request->input('name'),
    //         'ip_address' => $request->input('ip_address'),
    //         'username' => $request->input('username'),
    //         'password' => $request->filled('password') ? bcrypt($request->input('password')) : $router->password,
    //         'deskripsi' => $request->input('deskripsi'),
    //         'status' => $request->input('status'),
    //     ]);

    //     return redirect()->route('router')
    //         ->with('success', 'Router berhasil diperbarui');
    // }

}
