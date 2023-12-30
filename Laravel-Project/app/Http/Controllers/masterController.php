<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class masterController extends Controller
{
    public function pesanmasukIndex(){
        $pesans = Contact::orderBy('created_at','desc')->paginate(5);
        return view('layout/master', compact('pesans'));
    }
}
