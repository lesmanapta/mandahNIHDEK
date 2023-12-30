<?php

// app/Http/Controllers/PengeluaranController.php

// app/Http/Controllers/PengeluaranController.php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function create()
    {
        $categories = Pengeluaran::distinct('namakategori')->pluck('namakategori');
        return view('tambahpengeluaran', compact('categories'));
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
        $keyword = $request->input('keyword');

        $pengeluarans = Pengeluaran::when($keyword, function ($query) use ($keyword) {
            return $query->where('namakategori', 'like', "%$keyword%")
                ->orWhere('namapengeluaran', 'like', "%$keyword%")
                ->orWhere('hargapengeluaran', 'like', "%$keyword%");
        })->get();

        return view('laporanpengeluaran', compact('pengeluarans'));
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::find($id);

        return view('laporanpengeluaran', compact('pengeluaran'));
    }
}
