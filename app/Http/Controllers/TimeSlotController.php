<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeSlotController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'is_recurring' => 'boolean',
            'recurrence_type' => 'required_if:is_recurring,true|in:daily,weekly,monthly',
            'recurrence_end_date' => 'required_if:is_recurring,true|date|after:start_time',
        ]);

        $timeSlot = TimeSlot::create([
            'user_id' => Auth::id(),
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'is_booked' => false,
            'is_recurring' => $validated['is_recurring'] ?? false,
            'recurrence_type' => $validated['recurrence_type'] ?? null,
            'recurrence_end_date' => $validated['recurrence_end_date'] ?? null,
        ]);

        if ($timeSlot->is_recurring) {
            $this->createRecurringTimeSlots($timeSlot);
        }

        return response()->json($timeSlot, 201);
    }

    private function createRecurringTimeSlots(TimeSlot $originalSlot)
    {
        $startDate = $originalSlot->start_time->copy();
        $endDate = $originalSlot->recurrence_end_date;

        while ($startDate->lte($endDate)) {
            if ($startDate->gt($originalSlot->start_time)) {
                TimeSlot::create([
                    'user_id' => $originalSlot->user_id,
                    'start_time' => $startDate,
                    'end_time' => $startDate->copy()->setTimeFrom($originalSlot->end_time),
                    'is_booked' => false,
                    'is_recurring' => false,
                ]);
            }

            switch ($originalSlot->recurrence_type) {
                case 'daily':
                    $startDate->addDay();
                    break;
                case 'weekly':
                    $startDate->addWeek();
                    break;
                case 'monthly':
                    $startDate->addMonth();
                    break;
            }
        }
    }

    public function index()
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $timeSlots = TimeSlot::where('user_id', $userId)
                             ->where('is_booked', false)
                             ->get();

        return response()->json($timeSlots);
    }

    public function create()
    {
        return view('time_slots.create');
    }

    // Add more methods as needed
}