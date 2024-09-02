<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table1;
use Carbon\Carbon;

class TimeTableController extends Controller
{
    public function timetable()
    {
        $today = Carbon::now('Asia/Colombo')->format('l'); // Get today's day of the week
        $rows = Table1::where('date', $today)->get(); // Query rows where date matches today

        return view('index', compact('rows')); // Pass the $rows variable to the 'index' view
    }
}


