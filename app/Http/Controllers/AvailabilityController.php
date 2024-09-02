<?php

namespace App\Http\Controllers;

use App\Models\AvailabilityBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    public function index()
    {
        // Fetch availability blocks for the authenticated user
        $availabilityBlocks = AvailabilityBlock::where('user_id', Auth::id())->get();

        // Return the view with the availability blocks
        return view('availability.index', compact('availabilityBlocks'));
    }

    public function create()
    {
        return view('availability.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Store the availability in the database
        AvailabilityBlock::create([
            'user_id' => Auth::id(),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);

        // Redirect or return a response
        return redirect()->route('availability.create')->with('success', 'Availability created successfully.');
    }
}
