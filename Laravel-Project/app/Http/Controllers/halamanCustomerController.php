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
    //
    }

    public function updateAlamat(Request $request){

    }

    //update nomor telepon
    public function editNomorTelepon(){

    }
    
    public function updateNomorTelepon(Request $request){

    }

}