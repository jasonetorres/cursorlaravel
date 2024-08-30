<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTimeZone;

class SettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $timezones = DateTimeZone::listIdentifiers();
        return view('settings.index', compact('user', 'timezones'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'timezone' => 'required|string|timezone',
            'notification_preference' => 'required|in:email,sms,both',
        ]);

        $user->update($validated);

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}