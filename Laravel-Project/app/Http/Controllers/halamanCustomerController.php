<?php

namespace App\Http\Controllers;
use App\Models\Alamat;
use App\Models\Contact;
use Illuminate\Http\Request;

class halamanCustomerController extends Controller
{
    //pesan kontak kami
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        // Redirect back to the previous page
        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim.');
    }

    public function index(){
        $alamat = Alamat::all();
        return view('Customers/index', compact('alamat'));
    }


    //update alamat 
    public function editAlamat(){
        $alamat = Alamat::find('1');
        return view('editAlamat', compact('alamat'));
    }

    public function updateAlamat(Request $request){
        $alamat = Alamat::find('1');
        $alamat->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Bandwidth berhasil diperbarui');
    }

    //update nomor telepon
    public function editNomorTelepon(){
        $alamat = Alamat::find('1');
        return view('editNomorTelepon', compact('alamat'));
    }
    
    public function updateNomorTelepon(Request $request){
        $alamat = Alamat::find('1');
        $alamat->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Bandwidth berhasil diperbarui');
    }


    //delete pesan masuk di dashboard
    
    //index pesan masuk di dashboard
    public function pesanmasukIndex(){
        $pesans = Contact::paginate(4);
        return view('pesanmasuk', compact('pesans'));
    }
    
    public function deletePesanMasuk($id)
      {
        // Hapus data dari database
        Contact::destroy($id);

        return redirect()->route('pesanmasuk.index')
            ->with('success', 'Router berhasil dihapus');
    }
}