<?php

namespace App\Http\Controllers;
use App\Models\Routers;
use Illuminate\Http\Request;

class RoutersController extends Controller
{
    //
    

    public function index()
    {
        $Routers = Routers::all();
        return view('router', ['routers' => $Routers]);
    }

    public function create()
    {
        return view('router');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'ip_address' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        Router::create($data);

        return redirect()->route('routers.index')->with('success', 'Router created successfully.');
    }

}