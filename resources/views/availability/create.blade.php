@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create Availability</h1>
    <form action="{{ route('availability.store') }}" method="POST">
        @csrf
        <div class="mb-3 form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3 form-group">
            <label for="start_time">Start Time:</label>
            <input type="time" id="start_time" name="start_time" class="form-control" required>
        </div>
        <div class="mb-3 form-group">
            <label for="end_time">End Time:</label>
            <input type="time" id="end_time" name="end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
