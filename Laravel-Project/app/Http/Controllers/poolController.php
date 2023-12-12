<?php

namespace App\Http\Controllers;
use App\Models\pool;
use Illuminate\Http\Request;

class poolController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $inipool = pool::where('poolname','LIKE','%'.$keyword.'%')
        ->orWhere('range_ip','LIKE','%'.$keyword.'%') 
        ->orWhere('routers','LIKE','%'.$keyword.'%')
        ->paginate(5); 

        return view('ippool',['inipool' => $inipool, 'keyword' => $keyword]);
    }

    public function create()
    {
        return view('tambahippool');
    }

    public function store(Request $request)
    {
        $request->validate([
            'poolname' => 'required|unique:pool', //cek apkh poolname nya dobel ga di database
            'range_ip' => 'required|string',
            'routers' => 'required|exists:routers,name', //routernya y dimasukin hrs ada di table routers
        ]);

        pool::create([
            'poolname' => $request->input('poolname'),
            'range_ip' => $request->input('range_ip'),
            'routers' => $request->input('routers'),
        ]);

        return redirect()->route('ippool')
            ->with('success', 'Pool baru berhasil ditambahkan');
    }

    public function edit($id){
        $inipool = pool::findorFail($id);
        return view ('editpool', compact('inipool'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'poolname' => 'required|unique:pool', //cek apkh poolname nya dobel ga di database
            'range_ip' => 'required|string',
            'routers' => 'required|exists:routers,name', //routernya y dimasukin hrs ada di table routers
        ]);

        $inipool = pool::findorFail($id);

        $inipool->update([
            'poolname' => $request->input('poolname'),
            'range_ip' => $request->input('range_ip'),
            'routers' => $request->input('routers'),
        ]);

        return redirect()->route('ippool')
            ->with('success', 'Pool berhasil diberhaharui');
    }

    public function destroy($id)
    {
        pool::destroy($id);

        return redirect()->route('ippool')
            ->with('success', 'Pool berhasil dihapus');
    }
}
