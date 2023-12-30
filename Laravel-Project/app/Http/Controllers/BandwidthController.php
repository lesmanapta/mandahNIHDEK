<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandwidth;
use App\Http\Controllers\MasterController;



class BandwidthController extends masterController
{
    public function index(Request $request)
    {
        // $bandwidths = Bandwidth::all();
        $keyword = $request->keyword;
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        $bandwidths = Bandwidth::where('name_bw', 'LIKE','%'.$keyword.'%')
        ->paginate(5);

        return view('daftarbandwidth', compact('bandwidths', 'notifPesans', 'notifPengajuans'));
    }

    public function create()
    {
        $notifPesans = $this -> pesanmasukIndex();
        return view('bandwidthbaru', compact('notifPesans'));
    }
    public function store(Request $request)
   {
    $request->validate([
        'name_bw' => 'required|string|max:255',
        'rate_down' => 'required|integer',
        'rate_down_unit' => 'required|in:Kbps,Mbps',
        'rate_up' => 'required|integer',
        'rate_up_unit' => 'required|in:Kbps,Mbps',
    ]);

    Bandwidth::create($request->all());
    return redirect()->route('bandwidth.index')->with('success', 'Bandwidth berhasil ditambahkan');
   }

    public function edit($id)
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        $bandwidth = Bandwidth::find($id);
        return view('editbandwidth', compact('bandwidth', 'notifPesans', 'notifPengajuans'));
    }

    public function update(Request $request, $id)
    {
        $bandwidth = Bandwidth::find($id);
        $bandwidth->update($request->all());

        return redirect()->route('bandwidth.index')->with('success', 'Bandwidth berhasil diperbarui');
    }

    public function destroy($id)
    {
        Bandwidth::destroy($id);
        return redirect()->route('bandwidth.index')->with('success', 'Bandwidth berhasil dihapus');
    }
}
