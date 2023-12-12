<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\Routers; // Pastikan untuk mengimport model Router
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PoolController extends Controller
{
    
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $inipool = Pool::where('pool_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('range_ip', 'LIKE', '%' . $keyword . '%')
            ->orWhere('routers', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);

        return view('ippool', ['inipool' => $inipool, 'keyword' => $keyword]);
    }

    public function create()
    {
        $routers = Routers::all(); // Mengambil semua router dari database
        return view('tambahippool', compact('routers'));
    }

    public function store(Request $request)
    {
    Log::info('Store Request Data: ' . json_encode($request->all())); // Log request data

    $request->validate([
        'pool_name' => 'required|unique:pool', 
        'range_ip' => 'required|string',
        'routers' => 'required|exists:routers,id',
    ]);

    Log::info('Validated Data: ' . json_encode($request->all())); // Log validated data

    Pool::create([
        'pool_name' => $request->input('pool_name'),
        'range_ip' => $request->input('range_ip'),
        'routers' => $request->input('routers'),
    ]);

    Log::info('Pool Created');

    return redirect()->route('ippool.index')
        ->with('success', 'Pool baru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        Log::info('Update Request Data: ' . json_encode($request->all())); // Log request data

        $request->validate([
            'pool_name' => 'required|unique:pool,pool_name,' . $id, // Tambahkan pengecualian untuk pool_name dengan ID yang sama
            'range_ip' => 'required|string',
            'routers' => 'required|exists:routers,name',
        ]);

        Log::info('Validated Data: ' . json_encode($request->all())); // Log validated data

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
