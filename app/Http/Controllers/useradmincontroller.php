<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Useradmin;  // Make sure you import the correct model

class UseradminController extends Controller
{
    public function showRegistrationForm()
    {
        return view('useradmin.adminregister');
    }

    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:useradmins,email', // Fix the table name (should match plural form 'useradmins')
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        Useradmin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password, // The model will handle password hashing
        ]);

        // Redirect with success message
        return redirect()->route('useradmin.adminregister')->with('success', 'Admin registered successfully!');
    }
}
?>
