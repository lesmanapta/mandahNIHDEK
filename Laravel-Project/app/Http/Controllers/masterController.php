<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Paket;

class masterController extends Controller
{
    public function pesanmasukIndex(){
        $notifPesans = Contact::orderBy('created_at','desc')->paginate(5);

        return $notifPesans; 
    }

    public function pengajuanmasukIndex(){
        $notifPengajuans = Paket::orderBy('created_at','desc')->paginate(5);
        return $notifPengajuans;
    }
}
