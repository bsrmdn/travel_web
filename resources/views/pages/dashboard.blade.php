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
                <table class="table pb-3">
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
                                    <form action="/dashboard/{{ $schedule->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0"
                                            onclick="return confirm('Apakah Anda yakin akan menghapus jadwal?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="editModal{{ $loop->index }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $loop->index }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-1">
                                        <div class="modal-body">
                                            <div class="d-flex mb-5">
                                                <h1 class="modal-title fs-5 montserrat mx-auto fw-bolder"
                                                    id="editModalLabel{{ $loop->index }}">Edit Jadwal
                                                </h1>
                                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            {{-- Form --}}
                                            <form action="/dashboard/{{ $schedule->id }}" method="POST" class="px-3"
                                                enctype="multipart/form-data">
                                                @method('put')
                                                @csrf

                                                <div class="row">
                                                    <label for="{{ $loop->index }}editKelas"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Kelas</label>
                                                    <div class="col-sm-10 mb-3">
                                                        <select class="form-select montserrat mb-3"
                                                            id="editKelas{{ $loop->index }}" required name="id_kelas">
                                                            @foreach ($grades as $grade)
                                                                <option value="{{ $grade->id }}"
                                                                    @selected(old('id_kelas', $schedule) == $grade->id)>
                                                                    {{ $grade->tingkatan }}-{{ $grade->kelas }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editPelajaran{{ $loop->index }}"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Pelajaran</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select montserrat mb-3"
                                                            id="editPelajaran{{ $loop->index }}" required name="id_mapel">
                                                            @foreach ($mapels as $mapel)
                                                                <option value="{{ $mapel->id }}"
                                                                    @selected(old('id_mapel', $schedule) == $mapel->id)>
                                                                    {{ $mapel->mapel }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editHari{{ $loop->index }}"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Hari</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select montserrat mb-3"
                                                            id="editHari{{ $loop->index }}" required name="id_hari">
                                                            @foreach ($days as $day)
                                                                <option value="{{ $day->id }}"
                                                                    @selected(old('id_hari', $schedule) == $day->id)>
                                                                    {{ $day->hari }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editWaktuMulai{{ $loop->index }}"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                                        Mulai</label>
                                                    <div class="col-sm-10">
                                                        <input
                                                            value="{{ \Carbon\Carbon::parse(old('waktu_mulai', $schedule))->format('H:i') }}"
                                                            id="editWaktuMulai{{ $loop->index }}" type="time"
                                                            class="form-control montserrat mb-3" name="waktu_mulai"
                                                            required>
                                                    </div>
                                                    <label for="editWaktuSelesai{{ $loop->index }}"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                                        Selesai</label>
                                                    <div class="col-sm-10">
                                                        <input
                                                            value="{{ \Carbon\Carbon::parse(old('waktu_selesai', $schedule))->format('H:i') }}"
                                                            id="editWaktuSelesai{{ $loop->index }}" type="time"
                                                            class="form-control montserrat mb-3" name="waktu_selesai"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editRuang{{ $loop->index }}"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Ruang</label>
                                                    <div class="col-sm-10">
                                                        <input value="{{ old('ruang', $schedule) }}"
                                                            id="editRuang{{ $loop->index }}" type="text"
                                                            class="form-control montserrat mb-3" name="ruang">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editKeterangan{{ $loop->index }}"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Keterangan
                                                        (opsional)
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input value="{{ old('keterangan', $schedule->keterangan) }}"
                                                            id="editKeterangan{{ $loop->index }}" type="text"
                                                            class="form-control montserrat mb-3" name="keterangan">
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-end mt-2">
                                                    <button type="button"
                                                        class="btn btn-secondary mx-2 montserrat fw-semibold"
                                                        data-bs-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit"
                                                        class="btn btn-primary ms-2 montserrat fw-semibold"
                                                        id="liveToastBtn{{ $loop->index }}">Save
                                                        changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <p>{{ now('Asia/Jakarta')->toTimeString() }}</p> --}}
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
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-1">
                    <div class="modal-body">
                        <div class="d-flex mb-5">
                            <h1 class="modal-title fs-5 montserrat mx-auto fw-bolder" id="createModalLabel">Buat Jadwal
                                Baru
                            </h1>
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        {{-- Form --}}
                        <form action="/dashboard" method="POST" class="px-3" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <label for="createKelas"
                                    class="col-sm-2 col-form-label montserrat fw-semibold">Kelas</label>
                                <div class="col-sm-10 mb-3">
                                    <select class="form-select montserrat" id="createKelas" required name="id_kelas">
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">
                                                {{ $grade->tingkatan }}-{{ $grade->kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label for="createPelajaran"
                                    class="col-sm-2 col-form-label montserrat fw-semibold">Pelajaran</label>
                                <div class="col-sm-10">
                                    <select class="form-select montserrat mb-3" id="createtPelajaran" required
                                        name="id_mapel">
                                        @foreach ($mapels as $mapel)
                                            <option value="{{ $mapel->id }}">
                                                {{ $mapel->mapel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label for="editHari" class="col-sm-2 col-form-label montserrat fw-semibold">Hari</label>
                                <div class="col-sm-10">
                                    <select class="form-select montserrat mb-3" id="editHari" required name="id_hari">
                                        @foreach ($days as $day)
                                            <option value="{{ $day->id }}">
                                                {{ $day->hari }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label for="createWaktuMulai" class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                    Mulai</label>
                                <div class="col-sm-10">
                                    <input id="createWaktuMulai" type="time" value="07:00"
                                        class="form-control montserrat mb-3" name="waktu_mulai" required>
                                </div>
                                <label for="createWaktuSelesai"
                                    class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                    Selesai</label>
                                <div class="col-sm-10">
                                    <input id="createWaktuSelesai" type="time" value="15:00"
                                        class="form-control montserrat mb-3" name="waktu_selesai" required>
                                </div>
                            </div>

                            <div class="row">
                                <label for="createRuang"
                                    class="col-sm-2 col-form-label montserrat fw-semibold">Ruang</label>
                                <div class="col-sm-10">
                                    <input id="createRuang" type="text" class="form-control montserrat mb-3"
                                        name="ruang" required>
                                </div>
                            </div>

                            <div class="row">
                                <label for="createKeterangan"
                                    class="col-sm-2 col-form-label montserrat fw-semibold">Keterangan
                                    (opsional)
                                </label>
                                <div class="col-sm-10">
                                    <input id="createKeterangan" type="text" class="form-control montserrat mb-3"
                                        name="keterangan">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-2">
                                <button type="button" class="btn btn-secondary mx-2 montserrat fw-semibold"
                                    data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary ms-2 montserrat fw-semibold"
                                    id="liveToastBtn">Save
                                    changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
