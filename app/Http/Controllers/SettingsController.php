<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTimeZone;
use App\Models\User;

class SettingsController extends Controller
{
    public function index()
    {
        $user = auth::user();
        $timezones = DateTimeZone::listIdentifiers();
        return view('settings.index', compact('user', 'timezones'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'timezone' => 'required|string|timezone',
            'notification_preference' => 'required|in:email,sms,both',
        ]);

        $user->timezone = $validated['timezone'];
        $user->notification_preference = $validated['notification_preference'];
        $user->save();

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}