<table>
    <thead>
        <tr>
            <th>Kode Penerbangan</th>
            <th>Waktu Keberangkatan</th>
            <th>Waktu Sampai</th>
            <th>Lokasi Keberangkatan</th>
            <th>Lokasi Sampai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($flight_schedules as $schedule)
            <tr>
                <td>{{ $schedule->flight_number }}</td>
                <td>{{ $schedule->departure_time }}</td>
                <td>{{ $schedule->arrival_time }}</td>
                <td>{{ $schedule->departure_location }}</td>
                <td>{{ $schedule->arrival_location }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
