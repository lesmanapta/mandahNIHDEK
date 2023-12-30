<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class LaporanHarianController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $plans = Plan::where('status', 'LIKE', '%' . $keyword . '%')
            ->orWhere('namapaket', 'LIKE', '%' . $keyword . '%')
            ->orWhere('namabandwith', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nama_router', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);

        return view('laporanharian', ['plans' => $plans, 'keyword' => $keyword]);
    }
}
