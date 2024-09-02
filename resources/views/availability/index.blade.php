@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Your Availability</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($availabilityBlocks as $block)
                <tr>
                    <td>{{ $block->date }}</td>
                    <td>{{ $block->start_time }}</td>
                    <td>{{ $block->end_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('availability.create') }}" class="mt-3 btn btn-primary">Create New Availability</a>
</div>
@endsection
