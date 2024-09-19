@extends('layouts.allocation')

@section('content')
    <div class="container mt-5">
        {{-- Page Title --}}
        <h2 class="text-center mb-4">Reservation Details</h2>

        {{-- Reservation Details Table --}}
        <table class="table table-bordered">
            <tr>
                <th>Hall No</th>
                <td>{{ $reservation->hall }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $reservation->event_date }}</td>
            </tr>
            <tr>
                <th>Start Time</th>
                <td>{{ $reservation->start_time }}</td>
            </tr>
            <tr>
                <th>End Time</th>
                <td>{{ $reservation->end_time }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($reservation->status == 'Approved')
                        <span class="text-success">{{ $reservation->status }}</span>
                    @else
                        <span class="text-danger">{{ $reservation->status }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Purpose</th>
                <td>{{ $reservation->purpose }}</td>
            </tr>
        </table>

        {{-- Approve Button --}}
        @if($reservation->status != 'Approved')
            <div class="d-flex justify-content-center mt-4">
                <form action="{{ route('reservations.approve', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Approve Reservation</button>
                </form>
            </div>
        @endif

        {{-- Back Button --}}
        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('reservations.index') }}" class="btn btn-primary">Back to Reservations</a>
        </div>
    </div>
@endsection
