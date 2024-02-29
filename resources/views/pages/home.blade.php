<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Kode Penerbangan</th>
                <th>Nama Pesawat</th>
                <th>Tujuan</th>
                <th>Jam Berangkat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flightSchedules as $schedule)
                <tr>
                    <td>{{ $schedule->kode_penerbangan }}</td>
                    <td>{{ $schedule->nama_pesawat }}</td>
                    <td>{{ $schedule->tujuan }}</td>
                    <td>{{ $schedule->jam_berangkat }}</td>
                    <td>{{ $schedule->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
