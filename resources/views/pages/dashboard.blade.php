@extends('layouts.app')

@section('content')
    <header>
        <div class="row">
            <div class="col">
                <div id="pengumuman" class="p-3">
                    <marquee bgcolor="red">RUNNING TEXT LATAR KUNING</marquee>
                </div>
            </div>
        </div>
    </header>
    <div class="row px-3 mt-5">
        <div class="col">
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
                                <button class="btn btn-primary" data-bs-toggle="modal"
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
                                                    <select class="form-select montserrat" id="editKelas" required
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
                                                    <input id="editPelajaran" type="text" class="form-control montserrat"
                                                        name="pelajaran" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="editWaktuMulai"
                                                    class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                                    Mulai</label>
                                                <div class="col-sm-10">
                                                    <input id="editWaktuMulai" type="time" value="07:00"
                                                        class="form-control montserrat mb-3" name="waktu_mulai" required>
                                                </div>
                                                <label for="editWaktuSelesai"
                                                    class="col-sm-2 col-form-label montserrat fw-semibold">Waktu
                                                    Selesai</label>
                                                <div class="col-sm-10">
                                                    <input id="editWaktuSelesai" type="time" value="15:00"
                                                        class="form-control montserrat mb-3" name="waktu_selesai" required>
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
                    @endforeach
                    {{-- <p>{{ now('Asia/Jakarta')->toTimeString() }}</p> --}}
                </tbody>
            </table>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
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
            <div id="jadwal-sholat">
                <div class="row">
                    <div class="col-md-8">
                        <div id="sholat">Jadwal Sholat</div>
                    </div>
                    <div class="col-md-4">
                        <div class="waktu-item">
                            <strong></strong> <span id="jam-sekarang"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="waktu-sholat">
                            <!-- Data jadwal sholat lima waktu akan ditampilkan di sini -->
                        </div>
                    </div>
                    <div class="col-md-6">
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
@endsection
