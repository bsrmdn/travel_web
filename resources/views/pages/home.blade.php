@extends('layouts.app')
@section('content')
<head>
    <style>
    body {
    max-width: 100%;
    margin: 0 auto; 
    }
    body {
    max-height: 100%; 
    }
    body {
    overflow: hidden;
    }
    </style>
</head>
    <header>
        <div class="row">
            <div class="col">
                <div id="pengumuman" class="p-3 mb-3">
                    <marquee id="running-text">Loading...</marquee>
                </div>
            </div>
        </div>
    </header>
    <div class="row px-3">
        <div class="col custom-table p-1">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="carousel-item @if ($i == 1) active @endif">
                            <table class="table table-dark">
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
                                    @php
                                        switch ($i) {
                                            case 1:
                                                $kelas = [0, 10];
                                                break;
                                            case 2:
                                                $kelas = [11, 20];
                                                break;
                                            default:
                                                $kelas = [21, 30];
                                                break;
                                        }
                                    @endphp
                                    @foreach ($courseSchedules->whereBetween('id_kelas', $kelas) as $schedule)
                                        <tr class="schedule-row d-none">
                                            <td>{{ $schedule->kode_rombel }}</td>
                                            <td>{{ $schedule->pelajaran }}</td>
                                            <td class="start-time">{{ $schedule->waktu_mulai }}</td>
                                            <td class="end-time">{{ $schedule->waktu_selesai }}</td>
                                            <td>{{ $schedule->ruang }}</td>
                                            <td>{{ $schedule->keterangan }}</td>
                                        </tr>
                                    @endforeach
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
                <div id="sponsor" class="bg-light p-3 mb-3">
                    <div class="slider">
                        <div>
                            <!-- Video slide -->
                            <video controls autoplay muted loop onended="nextSlide()">
                                <source src="assets/vidio-for-slide.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div><img src="img/foto-for-slide.png" alt="Image 1"></div>
                        <div><img src="img/foto-for-slide-scnd.png" alt="Image 2"></div>
                        <!-- Tambahkan video atau gambar lainnya sesuai kebutuhan -->
                    </div>
                </div>
                <!-- Bagian Jadwal Guru Piket -->
                <div id="guru-piket" class="bg-light p-3 mb-3">
                    <h2>Jadwal Guru Piket</h2>
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="carousel-item @if ($i == 1) active @endif">
                        <table class="table table-dark">
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
                                @php
                                    switch ($i) {
                                        case 1:
                                            $kelas = [0, 10];
                                            break;
                                        case 2:
                                            $kelas = [11, 20];
                                            break;
                                        default:
                                            $kelas = [21, 30];
                                            break;
                                    }
                                @endphp
                                @foreach ($courseSchedules->whereBetween('id_kelas', $kelas) as $schedule)
                                    <tr class="schedule-row d-none">
                                        <td>{{ $schedule->kode_rombel }}</td>
                                        <td>{{ $schedule->pelajaran }}</td>
                                        <td class="start-time">{{ $schedule->waktu_mulai }}</td>
                                        <td class="end-time">{{ $schedule->waktu_selesai }}</td>
                                        <td>{{ $schedule->ruang }}</td>
                                        <td>{{ $schedule->keterangan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endfor
                </div>
                <div id="jadwal-sholat">
                    <div class="row">
                        <div class="col-8">
                            <div id="sholat">Jadwal Sholat</div>
                        </div>
                        <div class="col-4">
                            <div class="waktu-item">
                                <strong></strong> <span id="jam-sekarang"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="waktu-sholat">
                                <!-- Data jadwal sholat lima waktu akan ditampilkan di sini -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="waktu-sekarang">
                                <div class="kalender-item">
                                    <strong>Masehi:</strong> <span id="kalender-masehi"></span>
                                </div>
                                <div class="kalender-item">
                                    <strong>Hijriah:</strong> <span id="kalender-hijriah"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <footer>
            <div class="row">
                <div class="col">
                    <p>&copy; 2024 Nama Perusahaan. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
    <script>
        var announcements = [
            "Pengumuman 1",
            "Pengumuman 2",
            "Pengumuman 3",
            "Pengumuman 4"
        ];
    
        var index = 0;
        var interval;
    
        function changeAnnouncement() {
            document.getElementById("running-text").innerText = announcements[index];
            index = (index + 1) % announcements.length;
            document.getElementById("pengumuman").style.backgroundColor = getRandomColor();
        }
    
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    
        function startRunningText() {
            interval = setInterval(changeAnnouncement, 3000); // Ubah setiap 3 detik
        }
    
        function stopRunningText() {
            clearInterval(interval);
        }
    
        startRunningText(); // Mulai running text secara otomatis saat halaman dimuat
    </script>
@endsection
