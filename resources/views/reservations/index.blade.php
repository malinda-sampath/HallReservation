@extends('layouts.allocation')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Allocation Status</h2>

        {{-- Table Header --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hall No</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->hall }}</td>
                        <td>{{ $reservation->event_date }}</td>
                        <td>{{ $reservation->start_time }}</td>
                        <td>{{ $reservation->end_time }}</td>
                        <td>{{ $reservation->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No approved reservations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        {{-- Search Section --}}
        <hr class="my-5">

        <h3 class="text-center">Search for Update</h3>
        <div class="d-flex justify-content-center mt-3">
            <form action="{{ route('reservations.search') }}" method="GET" class="d-flex">
                <input type="text" name="request_id" class="form-control" placeholder="Enter your request ID" style="width: 300px;">
                <button type="submit" class="btn btn-success ml-2">Search</button>
            </form>
        </div>

        {{-- Display error messages --}}
        @if($errors->any())
            <div class="alert alert-danger mt-3">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Search Results Section --}}
        @if(isset($reservationSearch))
            <hr class="my-5">
            <h3 class="text-center">Search Results</h3>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Hall No</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $reservationSearch->hall }}</td>
                        <td>{{ $reservationSearch->event_date }}</td>
                        <td>{{ $reservationSearch->start_time }}</td>
                        <td>{{ $reservationSearch->end_time }}</td>
                         <td>{{ $reservationSearch->status }}</td>
                        <td><a href="{{ route('reservations.show', $reservationSearch->id) }}" class="btn btn-info">View</a></td>
                    </tr>
                </tbody>
            </table>
        @endif

        
    </div>
@endsection
