<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        dd($keyword);
        $users = User::where('fullname', 'LIKE','%'.$keyword.'%')
                        ->orWhere('username', 'LIKE','%'.$keyword.'%')
                        ->orWhere('user_type', 'LIKE','%'.$keyword.'%')
                        ->paginate(5);
        return view('pengaturanadmin', ['users' => $users]);
    }
}