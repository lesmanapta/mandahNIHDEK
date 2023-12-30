<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use App\Models\Paket;
use App\Models\Pengeluaran;
use App\Models\Plan;
use Illuminate\Http\Request;

class berandaController extends Controller
{
    //
    public function jumlahPelanggan(){
        $jumlahPelanggan = Customers::all()->count();

        $jumlahPengajuan = Paket::all()->count();

        $pengeluarans = Pengeluaran::all();
        $jumlahPengeluaran = number_format($pengeluarans->sum('hargapengeluaran'), 2);

        $pemasukans = Plan::all();
        $jumlahPendapatan = number_format($pemasukans->sum('harga'),2);

        return view("beranda", compact('jumlahPelanggan', 'jumlahPengajuan', 'jumlahPengeluaran', 'jumlahPendapatan'));
        // ->with("jumlahPelanggan",$jumlahPelanggan);
    }

    // public function jumlahPengajuan(){
    //     return view("dashboard")->with("jumlahPengajuan",$jumlahPengajuan);
    // }
}
