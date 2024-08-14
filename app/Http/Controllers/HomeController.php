<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table1;

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
        $query = Table1::query();

        // Apply filters if they exist
        if ($request->filled('hall_id')) {
            $query->where('hall_id', $request->input('hall_id'));
        }

        if ($request->filled('level')) {
            $query->where('level', $request->input('level'));
        }

        if ($request->filled('date')) {
            $query->where('date', $request->input('date'));
        }

        // Get the filtered results or all data if no filters are applied
        $data = $query->get();

        // Pass the data to the view
        return view('home', compact('data'));
    }
}
