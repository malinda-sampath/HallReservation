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
        ]);

        $validatedData['insert_date'] = now()->toDateString();

        Table1::create($validatedData);

        return redirect('/home')->with('success','Data Entry added successfully!');
    }

    public function edit($id)
    {
        return redirect()->route('home', ['edit_id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $table1 = Table1::find($id);

        // Update the fields
        $table1->hall_id = $request->input('hall_id');
        $table1->level = $request->input('level');
        $table1->subject_id = $request->input('subject_id');
        $table1->date = $request->input('date');
        $table1->start_time = $request->input('start_time');
        $table1->end_time = $request->input('end_time');
        
        // Update the update_date field
        $table1->update_date = now()->toDateString();

        $table1->save();

        return redirect()->route('home')->with('success', 'Data updated successfully!');
    } 

    public function delete($id)
    {
        $table1 = Table1::find($id);
        $table1 ->delete();

        return redirect('/home')->with('status',"Data deleted Successfully");
    }
}

