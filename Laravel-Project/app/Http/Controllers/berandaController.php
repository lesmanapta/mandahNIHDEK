<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use App\Models\Paket;
use App\Models\Pengeluaran;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;

class berandaController extends masterController
{
    //
    public function jumlahPelanggan(){
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();

        $jumlahPelanggan = Customers::all()->count();

        $jumlahPengajuan = Paket::all()->count();

        $pengeluarans = Pengeluaran::all();
        $jumlahPengeluaran = number_format($pengeluarans->sum('hargapengeluaran'), 2);

        $pemasukans = Plan::all();
        $jumlahPendapatan = number_format($pemasukans->sum('harga'),2);

        return view("beranda", compact('jumlahPelanggan', 'jumlahPengajuan', 'jumlahPengeluaran', 'jumlahPendapatan', 'notifPengajuans', 'notifPesans' ));
        // ->with("jumlahPelanggan",$jumlahPelanggan);
    }

    // public function jumlahPengajuan(){
    //     return view("dashboard")->with("jumlahPengajuan",$jumlahPengajuan);
    // }
}
