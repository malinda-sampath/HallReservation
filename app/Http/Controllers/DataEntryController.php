<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table1;

class DataEntryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hall_id' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'subject_id' => 'nullable|string|max:255',
            'date' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'is_visible' => 'boolean',
            'message' => 'nullable|string',
        ]);

        $validatedData['insert_date'] = now()->toDateString();
        // $validatedData['update_date'] = now()->toDateString();

        Table1::create($validatedData);

        return redirect('/home')->with('success','Data Entry added successfully!');
    }
}

