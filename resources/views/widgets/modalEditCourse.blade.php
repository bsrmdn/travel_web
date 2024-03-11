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
                <form action="/dashboard/jadwal/mapel/{{ $schedule->id }}" method="POST"
                    class="px-3" enctype="multipart/form-data">
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
                            id="liveToastBtnCourse{{ $loop->index }}">Save
                            changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>