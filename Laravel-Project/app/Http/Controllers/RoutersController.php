<?php

namespace App\Http\Controllers;
use App\Models\Routers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\MasterController;



class RoutersController extends masterController
{
    public function index(Request $request)
    {
        $notifPesans = $this -> pesanmasukIndex();
$notifPengajuans = $this ->pengajuanmasukIndex();

        $keyword = $request->keyword;
        $routers = Routers::where('name', 'LIKE','%'.$keyword.'%')
        ->orWhere('ip_address', 'LIKE','%'.$keyword.'%')
        ->orWhere('username', 'LIKE', '%'.$keyword.'%')
        ->orWhere('status', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);

        return view('router', ['routers' => $routers, 'keyword' => $keyword, 'notifPesans'=> $notifPesans,'notifPengajuans'=> $notifPengajuans]);
    }

    public function create()
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        return view('tambahrouter', compact('notifPesans', 'notifPengajuans'));

    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'name' => 'required|string',
            'ip_address' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'deskripsi' => 'nullable|string',
            'status' => ['required', Rule::in(['Enable', 'Disable'])], 
        ]);

        // Simpan data ke dalam database
        Routers::create([
                    'status' => $request->input('status'),
                    'name' => $request->input('name'),
                    'ip_address' => $request->input('ip_address'),
                    'username' => $request->input('username'),
                    'password' => bcrypt($request->input('password')),
                    'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('router')
            ->with('success', 'Router baru berhasil ditambahkan');
    }

    public function edit($id) 
    {
        $notifPesans = $this -> pesanmasukIndex();
$notifPengajuans = $this ->pengajuanmasukIndex();
    $router = Routers::findorFail($id);
    return view ('editrouter', compact('router', 'notifPesans', 'notifPengajuans'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'name' => 'required|string',
            'ip_address' => 'required|string',
            'username' => 'required|unique:routers,username,' . $id,
            'password' => 'required|string',
            'deskripsi' => 'nullable|string',
            'status' => ['required', Rule::in(['Enable', 'Disable'])],
        ]);

        $router = Routers::findOrFail($id);

        // Update data in the database
        $router->update([
            'name' => $request->input('name'),
            'ip_address' => $request->input('ip_address'),
            'username' => $request->input('username'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $router->password,
            'deskripsi' => $request->input('deskripsi'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('router')
            ->with('success', 'Router berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data dari database
        Routers::destroy($id);

        return redirect()->route('router')
            ->with('success', 'Router berhasil dihapus');
    }
    


}