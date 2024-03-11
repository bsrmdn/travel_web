<div class="modal fade" id="editModalPicket{{ $loop->index }}" tabindex="-1"
    aria-labelledby="editModalPicketLabel{{ $loop->index }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-1">
            <div class="modal-body">
                <div class="d-flex mb-5">
                    <h1 class="modal-title fs-5 montserrat mx-auto fw-bolder"
                        id="editModalPicketLabel{{ $loop->index }}">Edit Jadwal
                    </h1>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                {{-- Form --}}
                <form action="/dashboard/jadwal/piket/{{ $schedule->id }}" method="POST" class="px-3"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="row">
                        <label for="editTugasPiket{{ $loop->index }}"
                            class="col-sm-2 col-form-label montserrat fw-semibold">Tugas</label>
                        <div class="col-sm-10">
                            <select class="form-select montserrat mb-3" id="editTugasPiket{{ $loop->index }}" required
                                name="tugas">
                                @foreach (['Petugas Piket', 'Petugas 3S'] as $tugas)
                                    <option value="{{ $tugas }}" @selected(old('tugas', $schedule) == $tugas)>
                                        {{ $tugas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="editHariPiket{{ $loop->index }}"
                            class="col-sm-2 col-form-label montserrat fw-semibold">Hari</label>
                        <div class="col-sm-10">
                            <select class="form-select montserrat mb-3" id="editHariPiket{{ $loop->index }}" required
                                name="id_hari">
                                @foreach ($days as $day)
                                    <option value="{{ $day->id }}" @selected(old('id_hari', $schedule) == $day->id)>
                                        {{ $day->hari }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="editGuruPiket{{ $loop->index }}"
                            class="col-sm-2 col-form-label montserrat fw-semibold">Nama
                            Guru</label>
                        <div class="col-sm-10">
                            <select class="form-select montserrat mb-3" id="editGuruPiket{{ $loop->index }}" required
                                name="id_guru">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @selected(old('id_guru', $schedule) == $teacher->id)>
                                        {{ $teacher->nama_guru }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-secondary mx-2 montserrat fw-semibold"
                            data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary ms-2 montserrat fw-semibold"
                            id="liveToastBtnPiket{{ $loop->index }}">Save
                            changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
