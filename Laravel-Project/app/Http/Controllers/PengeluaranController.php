<?php

// app/Http/Controllers/PengeluaranController.php

// app/Http/Controllers/PengeluaranController.php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;


class PengeluaranController extends masterController
{
    public function create()
    {
        $notifPesans = $this -> pesanmasukIndex();
$notifPengajuans = $this ->pengajuanmasukIndex();
        $categories = Pengeluaran::distinct('namakategori')->pluck('namakategori');
        return view('tambahpengeluaran', compact('categories', 'notifPesans', 'notifPengajuans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakategori' => 'required|string',
            'namapengeluaran' => 'required|string',
            'hargapengeluaran' => 'required|numeric',
        ]);

        Pengeluaran::create([
            'namakategori' => $request->input('namakategori'),
            'namapengeluaran' => $request->input('namapengeluaran'),
            'hargapengeluaran' => $request->input('hargapengeluaran'),
        ]);

        return redirect()->route('laporanpengeluaran.index')->with('success', 'Data berhasil disimpan!');
    }

    public function index(Request $request)
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        $keyword = $request->keyword;
        $pengeluarans = Pengeluaran::where('namakategori', 'LIKE','%'.$keyword.'%')
        ->orWhere('namapengeluaran', 'LIKE','%'.$keyword.'%')
        ->paginate(5);

        return view('laporanpengeluaran', compact('pengeluarans', 'keyword', 'notifPesans', 'notifPengajuans'));
             // $keyword = $request->input('keyword');

        // $pengeluarans = Pengeluaran::when($keyword, function ($query) use ($keyword) {
        //     return $query->where('namakategori', 'like', "%$keyword%")
        //         ->orWhere('namapengeluaran', 'like', "%$keyword%")
        //         ->orWhere('hargapengeluaran', 'like', "%$keyword%");
        // })->get();

        // return view('laporanpengeluaran', compact('pengeluarans'));
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::find($id);

        return view('laporanpengeluaran', compact('pengeluaran'));
    }
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);

        if (!$pengeluaran) {
            return redirect()->route('laporanpengeluaran.index')->with('error', 'Data not found!');
        }

        $pengeluaran->delete();

        return redirect()->route('laporanpengeluaran.index')->with('success', 'Data berhasil dihapus!');
    }
}
