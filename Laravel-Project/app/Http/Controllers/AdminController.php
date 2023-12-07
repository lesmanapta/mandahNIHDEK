<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('tambahadmin');
    }

    public function store(Request $request)
    {
        // Validate the form data
        
        $request->validate([
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'user_type' => 'required|in:Super Admin, Admin',
            'password' => 'required|confirmed|min:6'
        ]);
        // Create a new user in the database
        User::create([
            'username' => $request->input('username'),
            'fullname' => $request->input('fullname'),
            'user_type' => $request->input('user_type'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirect to the admin settings page or wherever you want
        return redirect()->route('pengaturanadmin')->with('success', 'Admin added successfully.');
    }

    public function editAdmin($id)
    {
        // Retrieve the admin data based on the ID
        $admin = User::find($id);

        return view('editadmin');
    }

    public function updateAdmin(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required|string|max:45|unique:users,username,' . $id,
            'fullname' => 'required|string|max:45',
            'user_type' => 'required|in:Super Admin,Admin',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update the admin data
        $admin = User::find($id);
        $admin->update($request->all());

        return redirect('/pengaturanadmin')->with('success', 'Admin updated successfully');
    }

    public function deleteAdmin($id)
    {
        // Delete the admin based on the ID
        User::destroy($id);

        return redirect('/pengaturanadmin')->with('success', 'Admin deleted successfully');
    }
}
