@extends('layouts.app')

@section('content')
    <header>
        <div class="row">
            <div class="col">
                <div id="pengumuman" class="p-3">
                    <marquee id="running-text">Loading...</marquee>
                </div>
            </div>
        </div>
    </header>
    <div class="row px-3 mt-5">
        <div class="col">
            <div class="overflow-y-scroll" id="courseScheduleSection">
                <table class="table pb-3 text-center">
                    <thead>
                        <tr>
                            <th scope="col">Kode Rombel</th>
                            <th scope="col">Pelajaran</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Selesai</th>
                            <th scope="col">Ruang</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseSchedules as $schedule)
                            <tr class="schedule-row">
                                <td>{{ $schedule->kode_rombel }}</td>
                                <td>{{ $schedule->pelajaran }}</td>
                                <td>{{ $schedule->hari }}</td>
                                <td class="start-time">{{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }}
                                </td>
                                <td class="end-time">{{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }}
                                </td>
                                <td>{{ $schedule->ruang }}</td>
                                <td>{{ $schedule->keterangan }}</td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $loop->index }}">Edit</button>
                                    <form action="/dashboard/jadwal/mapel/{{ $schedule->id }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0"
                                            onclick="return confirm('Apakah Anda yakin akan menghapus jadwal?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- Modal Edit --}}
                            @include('widgets.modalEditCourse')
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                <button class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#createModal">Tambah
                    Jadwal
                    Baru</button>
            </div>
        </div>

        {{-- Modal Create --}}
        @include('widgets.modalCreateCourse')

    </div>
    <div class="row px-3 mt-5">
        <div class="col" id="picketScheduleSection">
            <table class="table pb-3 text-center">
                <thead>
                    <tr>
                        <th scope="col">Tugas</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Guru yang Bertugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($picketSchedules as $schedule)
                        <tr class="schedule-row">
                            <td>{{ $schedule->tugas }}</td>
                            <td>{{ $schedule->hari }}</td>
                            <td>{{ $schedule->nama_guru }}</td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModalPicket{{ $loop->index }}">Edit</button>
                                <form action="/dashboard/jadwal/piket/{{ $schedule->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger border-0"
                                        onclick="return confirm('Apakah Anda yakin akan menghapus jadwal?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        {{-- Modal Edit --}}
                        @include('widgets.modalEditPiket')
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mt-5">
                <button class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#createModalPiket">Tambah
                    Jadwal Baru</button>
            </div>
            @include('widgets.modalCreatePiket')
        </div>
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
