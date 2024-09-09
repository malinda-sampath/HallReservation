<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reservation;
use PDF;

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
            'contact_num' => 'required|string|max:20',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);
    
        // Create a new reservation record in the database
        $newRequest = Reservation::create([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'hall' => $request->input('hall'),
            'purpose' => $request->input('purpose'),
            'contact_num' => $request->input('contact_num'),
            'event_date' => $request->input('event_date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'status' => 'pending', // Initial status can be set to 'pending' by default
        ]);
    
    // Redirect to feedback page with the new request's ID
    return redirect()->route('requests.feedback', ['id' => $newRequest->id]);
   
}




public function feedback($id)
{
    // Use the Reservation model to find the reservation by ID
    $requestDetails = Reservation::findOrFail($id);

    // Pass the Request ID to the feedback view
    return view('feedback', compact('requestDetails'));
}



public function downloadPDF($id)
{
    // Use the Reservation model to find the reservation by ID
    $requestDetails = Reservation::findOrFail($id);

    // Load the PDF view and pass the request details
    $pdf = PDF::loadView('pdf_template', compact('requestDetails'));

    // Download the PDF file
    return $pdf->download('request_details.pdf');
}
}

