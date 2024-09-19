<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Display the reservation status view with only approved reservations
    public function index()
    {
        // Fetch only approved reservations and those not expired
        $reservations = Reservation::where('status', 'Approved')
            ->where('event_date', '>=', now()->toDateString())
            ->get();
        
        return view('reservations.index', compact('reservations'));
    }

   
    public function search(Request $request)
    {
        $request->validate([
            'request_id' => 'required|numeric',
            'status' => 'sometimes|in:Approved,Pending'
        ]);

        $status = $request->get('status'); 

        $reservation = Reservation::where('id', $request->request_id)
            ->where(function($query) use ($status) {
                if ($status) {
                    $query->where('status', $status);
                }
            })
            ->first();

        if ($reservation) {
            return view('reservations.index', [
                'reservationSearch' => $reservation,
                'reservations' => Reservation::where('status','Approved')
                ->where('event_date', '>=', now()->toDateString())
                ->get()
            ]);
        }

        return redirect()->route('reservations.index')->withErrors('No matching reservation found.');
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('reservations.show', compact('reservation'));
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->status !== 'Approved') {
            $reservation->status = 'Approved';
            $reservation->save();
        }

        return redirect()->route('reservations.show', $reservation->id)->with('status', 'Reservation approved successfully!');
    }
}

