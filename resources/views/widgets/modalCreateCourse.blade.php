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
                <form action="{{ route('createSchedule') }}" method="POST" class="px-3"
                    enctype="multipart/form-data">
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
                            <select class="form-select montserrat mb-3" id="createtPelajaran" required name="id_mapel">
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
                            <input id="createRuang" type="text" class="form-control montserrat mb-3" name="ruang"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <label for="createKeterangan" class="col-sm-2 col-form-label montserrat fw-semibold">Keterangan
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
                            id="liveToastBtnCreate">Save
                            changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
