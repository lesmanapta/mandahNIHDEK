<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandwidth;

class BandwidthController extends Controller
{
    public function index()
    {
        $bandwidths = Bandwidth::all();
        return view('daftarbandwidth', compact('bandwidths'));
    }

    public function create()
    {
        return view('bandwidth.create');
    }

    public function store(Request $request)
    {
        Bandwidth::create($request->all());
        return redirect()->route('bandwidth.index')->with('success', 'Bandwidth berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bandwidth = Bandwidth::find($id);
        return view('bandwidth.edit', compact('bandwidth'));
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
