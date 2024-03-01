@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  </head>
<body>
    <header>
        <div class="row">
            <div class="col">
                <div id="pengumuman" class="p-3">
                    <marquee bgcolor="red">RUNNING TEXT LATAR KUNING</marquee>
                </div>
            </div>
        </div>
    </header>
    <div class="row px-3">
        <div class="col">
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
                                        <tr class="schedule-row d-none">
                                            <td>{{ $schedule->kode_rombel }}</td>
                                            <td>{{ $schedule->pelajaran }}</td>
                                            <td class="start-time">{{ $schedule->waktu_mulai }}</td>
                                            <td class="end-time">{{ $schedule->waktu_selesai }}</td>
                                            <td>{{ $schedule->ruang }}</td>
                                            <td>{{ $schedule->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                    {{-- <p>{{ now('Asia/Jakarta')->toTimeString() }}</p> --}}
                                </tbody>
                            </table>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <!-- Bagian Sponsor, Jadwal Guru Piket, dan Jadwal Sholat -->
        <div class="col-4">
            <aside>
                <!-- Bagian sponsor -->
                <div id="sponsor" class="bg-light p-3 mb-3">
                    <h2>Sponsor</h2>
                    <p>Isi sponsor disini</p>
                </div>
                <!-- Bagian Jadwal Guru Piket -->
                <div id="guru-piket" class="bg-light p-3 mb-3">
                    <h2>Jadwal Guru Piket</h2>
                    <p>Isi jadwal guru piket disini</p>
                </div>
                <!-- Bagian Jadwal Sholat -->
                <div id="jadwal-sholat" class="bg-light p-3">
                    <h2>Jadwal Sholat</h2>
                    <p>Isi jadwal sholat disini</p>
                </div>
            </aside>
        </div>
    </div>
    {{-- <script>
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
    </script> --}}
</body>
@endsection
