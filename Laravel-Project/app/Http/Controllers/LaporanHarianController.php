<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Http\Controllers\MasterController;

class LaporanHarianController extends masterController
{
    public function index(Request $request)
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        $keyword = $request->keyword;
        $plans = Plan::where('namapaket', 'LIKE', '%' . $keyword . '%')
            ->orWhere('namabandwith', 'LIKE', '%' . $keyword . '%')
            ->paginate(7);

        return view('laporanharian', compact('plans', 'keyword', 'notifPesans', 'notifPengajuans'));
        //  ['plans' => $plans, 'keyword' => $keyword]);
    }
}
