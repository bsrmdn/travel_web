<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @for ($i = 0; $i < 3; $i++)
                <div class="carousel-item active">
                    <table class="table pb-3">
                        <thead>
                            <tr>
                                <th scope="col">Kode Rombel</th>
                                <th scope="col">Pelajaran</th>
                                <th scope="col">Waktu Mulai</th>
                                <th scope="col">Waktu Selesai</th>
                                <th scope="col">Ruang</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courseSchedules as $schedule)
                                @if ($schedule->waktu_mulai >= now('Asia/Jakarta')->toTimeString())
                                @endif
                                <tr>
                                    <td>{{ $schedule->kode_rombel }}</td>
                                    <td>{{ $schedule->pelajaran }}</td>
                                    <td>{{ $schedule->waktu_mulai }}</td>
                                    <td>{{ $schedule->waktu_selesai }}</td>
                                    <td>{{ $schedule->ruang }}</td>
                                    <td>{{ $schedule->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        fetch('/')
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
