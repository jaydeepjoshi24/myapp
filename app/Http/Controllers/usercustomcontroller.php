<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\usercustom;

class usercustomcontroller extends Controller
{
    public function showRegistrationForm()
    {
        return view('usercustom.customregister');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usercustom,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('usercustom.customregister')->with('success', 'Customer registered successfully!');
    }}
