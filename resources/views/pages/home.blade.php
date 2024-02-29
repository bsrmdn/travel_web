<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        fetch('/flight-schedules')
        .then(response => response.json())
        .then(data => {
            const currentTime = new Date();
            const filteredSchedules = data.filter(schedule => {
            const departureTime = new Date(schedule.departure_time);
            return departureTime > currentTime;
            });

            // Lakukan sesuatu dengan filteredSchedules, misalnya menampilkan dalam tabel HTML
            console.log(filteredSchedules);
        })
        .catch(error => console.error('Error:', error));

    </script>
</body>

</html>
