<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller

{
    public function index()
    {
        $bookings = Booking::all();
        return view('booking.index', compact('bookings'));
        // return redirect()->route('bookings.index')->with('success', 'Booking successfully created.');

    }
    public function create()
    {
        return view('booking.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:bookings,customer_email',
            'booking_date' => 'required|date',
            'booking_type' => 'required',
            'booking_slot' => 'nullable|required_if:booking_type,Half Day',
            'booking_from' => 'nullable|required_if:booking_type,Custom|date_format:H:i',
            'booking_to' => 'nullable|required_if:booking_type,Custom|date_format:H:i|after:booking_from',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking successfully created.');
    }
    


}
