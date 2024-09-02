<?php

namespace App\Http\Controllers;

use App\Models\AvailabilityBlock;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::where('user_id', Auth::id())->get();
        return view('meetings.index', compact('meetings'));
    }

    public function create(AvailabilityBlock $availabilityBlock)
    {
        return view('meetings.create', compact('availabilityBlock'));
    }

    public function store(Request $request, AvailabilityBlock $availabilityBlock)
    {
        $request->validate([
            'meeting_type' => 'required|string',
        ]);

        Meeting::create([
            'user_id' => Auth::id(),
            'availability_block_id' => $availabilityBlock->id,
            'meeting_type' => $request->meeting_type,
        ]);

        return redirect()->route('meetings.index');
    }
}