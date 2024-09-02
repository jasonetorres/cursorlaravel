@extends('layouts.app')

@section('content')
    <h1>Scheduled Meetings</h1>
    <a href="{{ route('availability.index') }}">Back to Availability</a>
    <ul>
        @foreach($meetings as $meeting)
            <li>
                <strong>Meeting Type:</strong> {{ $meeting->meeting_type }}<br>
                <strong>Start Time:</strong> {{ $meeting->availabilityBlock->start_time }}<br>
                <strong>End Time:</strong> {{ $meeting->availabilityBlock->end_time }}<br>
                <strong>Booked By:</strong> {{ $meeting->user->name }}
            </li>
        @endforeach
    </ul>
@endsection
