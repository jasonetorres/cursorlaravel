<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, TimeSlot $timeSlot)
    {
        $validated = $request->validate([
            'booker_name' => 'required|string',
            'booker_email' => 'required|email',
        ]);

        if ($timeSlot->is_booked) {
            return response()->json(['message' => 'This time slot is already booked.'], 422);
        }

        $booking = Booking::create([
            'time_slot_id' => $timeSlot->id,
            'booker_name' => $validated['booker_name'],
            'booker_email' => $validated['booker_email'],
        ]);

        $timeSlot->update(['is_booked' => true]);

        return response()->json($booking, 201);
    }
}