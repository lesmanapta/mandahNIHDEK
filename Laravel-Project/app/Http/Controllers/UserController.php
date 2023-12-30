<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;

class UserController extends masterController
{
    public function index(Request $request)
    {
        $notifPesans = $this -> pesanmasukIndex();
$notifPengajuans = $this ->pengajuanmasukIndex();
        $keyword = $request->keyword;

        $users = User::where('fullname', 'LIKE','%'.$keyword.'%')
                        ->orWhere('username', 'LIKE','%'.$keyword.'%')
                        ->orWhere('user_type', 'LIKE', '%'.$keyword.'%')
                        ->paginate(5);
        return view('pengaturanadmin', ['users' => $users, 'keyword' => $keyword, 'notifPesans'=> $notifPesans,'notifPengajuans'=> $notifPengajuans]);
    }
}
