<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ContactController extends Controller
{
    
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'hall' => 'required|string|max:255',
        'purpose' => 'required|string|max:500',
        'contact-num' => 'required|string|max:20',
        'event-date' => 'required|date',
        'start-time' => 'required',
        'end-time' => 'required|after:start-time',
    ]);

    // Create a new reservation record in the database
    Reservation::create([
        'name' => $request->input('name'),
        'position' => $request->input('position'),
        'hall' => $request->input('hall'),
        'purpose' => $request->input('purpose'),
        'contact-num' => $request->input('contact-num'),
        'event-date' => $request->input('event-date'),
        'start-time' => $request->input('start-time'),
        'end-time' => $request->input('end-time'),
        'status' => 'pending', // Initial status can be set to 'pending' by default
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Reservation request created successfully!');
}

   
}

