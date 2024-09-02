@extends('layouts.app')

@section('content')
    <h1>Book Meeting</h1>
    <form action="{{ route('meetings.store', $availabilityBlock) }}" method="POST">
        @csrf
        <label for="meeting_type">Meeting Type:</label>
        <input type="text" id="meeting_type" name="meeting_type" required>
        <button type="submit">Book</button>
    </form>
@endsection
