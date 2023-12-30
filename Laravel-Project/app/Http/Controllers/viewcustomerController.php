<?php

namespace App\Http\Controllers;
use App\Models\Alamat;
use Illuminate\Http\Request;

class viewcustomerController extends Controller
{
    //
    public function index(){
//         $notifPesans = $this -> pesanmasukIndex();
// $notifPengajuans = $this ->pengajuanmasukIndex();
        $alamat = Alamat::all();
        return view('Customers/index', compact('alamat'));
    }
}
