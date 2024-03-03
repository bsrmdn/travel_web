@extends('layouts.app')

@section('content')
    <header>
        <div class="row">
            <div class="col">
                <div id="pengumuman" class="p-3">
                    <marquee bgcolor="red">RUNNING TEXT LATAR KUNING</marquee>
                </div>
                <div id="logo" class="container-fluid text-center">
                    <img src="img/Logo-smkmutuharjo.png" alt="Logo Instansi" width="100px">
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
                                <td class="start-time">{{ $schedule->waktu_mulai }}</td>
                                <td class="end-time">{{ $schedule->waktu_selesai }}</td>
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
                                                    <label for="editKelas"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Kelas</label>
                                                    <div class="col-sm-10 mb-3">
                                                        <select class="form-select montserrat mb-3" id="editKelas" required
                                                            name="id_kelas">
                                                            @foreach ($grades as $grade)
                                                                <option value="{{ $grade->id }}">
                                                                    {{ $grade->tingkatan }}-{{ $grade->kelas }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editPelajaran"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Pelajaran</label>
                                                    <div class="col-sm-10">
                                                        <input value="{{ old('pelajaran', $schedule->pelajaran) }}"
                                                            id="editPelajaran" type="text"
                                                            class="form-control montserrat mb-3" name="pelajaran" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editWaktuMulai"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                                        Mulai</label>
                                                    <div class="col-sm-10">
                                                        <input value="{{ old('waktu_mulai', $schedule->waktu_mulai) }}"
                                                            id="editWaktuMulai" type="time" value="07:00"
                                                            class="form-control montserrat mb-3" name="waktu_mulai"
                                                            required>
                                                    </div>
                                                    <label for="editWaktuSelesai"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                                        Selesai</label>
                                                    <div class="col-sm-10">
                                                        <input value="{{ old('waktu_selesai', $schedule->waktu_selesai) }}"
                                                            id="editWaktuSelesai" type="time" value="15:00"
                                                            class="form-control montserrat mb-3" name="waktu_selesai"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editRuang"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Ruang</label>
                                                    <div class="col-sm-10">
                                                        <input value="{{ old('ruang', $schedule->ruang) }}" id="editRuang"
                                                            type="text" class="form-control montserrat mb-3"
                                                            name="ruang">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="editKeterangan"
                                                        class="col-sm-2 col-form-label montserrat fw-semibold">Keterangan
                                                        (opsional)
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input value="{{ old('keterangan', $schedule->keterangan) }}"
                                                            id="editKeterangan" type="text"
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
                                                        id="liveToastBtn">Save
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
                    <p>Isi jadwal guru piket disini</p>
                </div>
                {{-- Jadwal Sholat dll --}}
                <div id="jadwal-sholat">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="sholat">Jadwal Sholat</div>
                            <div class="waktu-sholat mt-4">
                                <!-- Data jadwal sholat lima waktu akan ditampilkan di sini -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="waktu-item">
                                <strong></strong> <span id="jam-sekarang"></span>
                            </div>
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
                {{-- END --}}
            </aside>
        </div>
    </div>
    {{-- Modal Create --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-1">
                <div class="modal-body">
                    <div class="d-flex mb-5">
                        <h1 class="modal-title fs-5 montserrat mx-auto fw-bolder" id="createModalLabel">Buat Jadwal Baru
                        </h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    {{-- Form --}}
                    <form action="/dashboard" method="POST" class="px-3" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <label for="createKelas" class="col-sm-2 col-form-label montserrat fw-semibold">Kelas</label>
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
                                <input id="createPelajaran" type="text" class="form-control montserrat mb-3"
                                    name="pelajaran" required>
                            </div>
                        </div>

                        <div class="row">
                            <label for="createWaktuMulai" class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                Mulai</label>
                            <div class="col-sm-10">
                                <input id="createWaktuMulai" type="time" value="07:00"
                                    class="form-control montserrat mb-3" name="waktu_mulai" required>
                            </div>
                            <label for="createWaktuSelesai" class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                Selesai</label>
                            <div class="col-sm-10">
                                <input id="createWaktuSelesai" type="time" value="15:00"
                                    class="form-control montserrat mb-3" name="waktu_selesai" required>
                            </div>
                        </div>

                        <div class="row">
                            <label for="createRuang" class="col-sm-2 col-form-label montserrat fw-semibold">Ruang</label>
                            <div class="col-sm-10">
                                <input id="createRuang" type="text" class="form-control montserrat mb-3"
                                    name="ruang">
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
@endsection
