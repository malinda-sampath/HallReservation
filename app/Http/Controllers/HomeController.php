<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Table1;
    use App\Models\Reservation;
    use Carbon\Carbon;

    class HomeController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard or search results.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index(Request $request)
        {
            // Query for Table1 data
            $query = Table1::query();

            // Apply filters if they exist
            if ($request->filled('hall_id')) {
                $query->where('hall_id', $request->input('hall_id'));
            }

            if ($request->filled('date')) {
                $query->where('date', $request->input('date'));
            }

            // Get the filtered results or all data if no filters are applied
            $data = $query->get();

            // Check if an edit_id is provided
            $table1 = null;
            if ($request->has('edit_id')) {
                $table1 = Table1::find($request->edit_id);
            }

            // Query for Reservation data
            $reservationQuery = Reservation::query();

            // Filter by status if selected
            if ($request->filled('status')) {
                $reservationQuery->where('status', $request->input('status'));
            }

            // Get the filtered reservations data
            $reservationsData = $reservationQuery->get();

            // Pass the data and the specific record to be edited (if any) to the view
            return view('home', compact('data', 'table1', 'reservationsData'));


        }

        public function destroy($id)
        {
            // Find the reservation record and delete it
            $reservation = Reservation::find($id);
            if ($reservation) {
                $reservation->delete();
            }

            return redirect()->back()->with('success', 'Reservation deleted successfully.');
        }

        public function destroyTable1Record($id)
        {
            $record = Table1::find($id);
            if ($record) {
                $record->delete();
                return redirect()->back()->with('success', 'Record deleted successfully');
            }
            return redirect()->back()->with('error', 'Record not found');
        }

        public function updateStatus(Request $request, $id)
        {
            // Find the reservation by ID
            $reservation = Reservation::find($id);

            if ($reservation) {
                // Update the status and respond date
                $reservation->status = $request->status;
                $reservation->update_date = Carbon::now(); // Set respond date to current date
                $reservation->save(); // Save the changes to the database

                return redirect()->back()->with('success', 'Status updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Reservation not found.');
            }
        }
    }
