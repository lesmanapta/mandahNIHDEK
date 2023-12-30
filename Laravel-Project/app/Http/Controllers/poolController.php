<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\Routers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\MasterController;


class PoolController extends masterController
{
    public function index(Request $request)
    {
        $notifPesans = $this -> pesanmasukIndex();
$notifPengajuans = $this ->pengajuanmasukIndex();
        $keyword = $request->keyword;
        $inipool = Pool::where('pool_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('range_ip', 'LIKE', '%' . $keyword . '%')
            ->orWhere('routers', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);

        return view('ippool', ['inipool' => $inipool, 'keyword' => $keyword, 'notifPesans'=> $notifPesans,'notifPengajuans'=> $notifPengajuans]);
    }

    public function create()
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        $routers = Routers::all();
        return view('tambahippool', compact('routers', 'notifPesans', 'notifPengajuans'));
    }

    public function store(Request $request)
    {
        Log::info('Store Request Data: ' . json_encode($request->all()));

        $request->validate([
            'pool_name' => 'required|unique:pool', 
            'range_ip' => 'required|string',
            'routers' => 'required|exists:routers,id',
        ]);

        Log::info('Validated Data: ' . json_encode($request->all()));

        Pool::create([
            'pool_name' => $request->input('pool_name'),
            'range_ip' => $request->input('range_ip'),
            'routers' => $request->input('routers'),
        ]);

        Log::info('Pool Created');

        return redirect()->route('ippool.index')
            ->with('success', 'Pool baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        $pool = Pool::findOrFail($id); // Ganti 'admin' menjadi 'pool'
        $routers = Routers::all();
        return view('editippool', compact('pool', 'routers', 'notifPesans', 'notifPengajuans')); // Ganti 'admin' menjadi 'pool'
    }

    public function update(Request $request, $id)
    {
        Log::info('Update Request Data: ' . json_encode($request->all()));

        $request->validate([
            'pool_name' => 'required|unique:pool,pool_name,' . $id,
            'range_ip' => 'required|string',
            'routers' => 'required|exists:routers,id',
        ]);

        Log::info('Validated Data: ' . json_encode($request->all()));

        $inipool = Pool::findOrFail($id);

        $inipool->update([
            'pool_name' => $request->input('pool_name'),
            'range_ip' => $request->input('range_ip'),
            'routers' => $request->input('routers'),
        ]);

        Log::info('Pool Updated');

        return redirect()->route('ippool.index')
            ->with('success', 'Pool berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pool::destroy($id);

        return redirect()->route('ippool.index')
            ->with('success', 'Pool berhasil dihapus');
    }
}
