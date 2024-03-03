<!DOCTYPE html>
<html>

<head>
    <title>Contact Form Submission</title>
</head>

<body>
    <h2>Booking</h2>
    <p><strong>Book Date</strong> {{ $details['date'] }} </p>
    <p><strong>Bus Number</strong> {{ $details['bus_id'] }}</p>
    <p><strong>Price</strong> {{ $details['price'] }}</p>

    {{-- Check if seat_numbers is set and not empty --}}
    @isset($details['seat_numbers'])
    <p><strong>Seat Numbers</strong></p>
    <ul>
        @foreach ($details['seat_numbers'] as $index => $seatNumber)
        <li>{{ $index }}: {{ $seatNumber }}</li>
        @endforeach
    </ul>
    @else
    <p>No seat numbers provided</p>
    @endisset


</body>

</html>
