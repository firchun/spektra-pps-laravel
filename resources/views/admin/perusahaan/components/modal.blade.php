<!-- Modal for Create and Edit -->
<div class="modal fade" id="customersModal" tabindex="-1" aria-labelledby="customersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Update Data Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for Create and Edit -->
                <form id="userForm">
                    <input type="hidden" id="formCustomerId" name="id">
                    <!-- Nama Perusahaan -->
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Status Perusahaan (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_status_perusahaan" class="form-label">Status Perusahaan</label>
                                <select class="form-control" id="id_status_perusahaan" name="id_status_perusahaan"
                                    required>
                                    <option value="">Pilih Status</option>
                                    @foreach (App\Models\StatusPerusahaan::all() as $statusPerusahaan)
                                        <option value="{{ $statusPerusahaan->id }}">{{ $statusPerusahaan->status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Skala Objek Pengawasan (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_skala_objek_pengawasan" class="form-label">Skala Objek Pengawasan</label>
                                <select class="form-control" id="id_skala_objek_pengawasan"
                                    name="id_skala_objek_pengawasan" required>
                                    <option value="">Pilih Skala</option>
                                    @foreach (App\Models\SkalaObjekPengawasan::all() as $skala)
                                        <option value="{{ $skala->id }}">{{ $skala->skala_objek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Kode WLKP -->
                            <div class="mb-3">
                                <label for="kode_wlkp" class="form-label">Kode WLKP</label>
                                <input type="text" class="form-control" id="kode_wlkp" name="kode_wlkp"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <!-- Kepemilikan Perusahaan (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_kepemilikan_perusahaan" class="form-label">Kepemilikan Perusahaan</label>
                                <select class="form-control" id="id_kepemilikan_perusahaan"
                                    name="id_kepemilikan_perusahaan" required>
                                    <option value="">Pilih Kepemilikan</option>
                                    @foreach (App\Models\KepemilikanPerusahaan::all() as $kepemilikan)
                                        <option value="{{ $kepemilikan->id }}">{{ $kepemilikan->kepemilikan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status Modal (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_status_modal" class="form-label">Status Modal</label>
                                <select class="form-control" id="id_status_modal" name="id_status_modal" required>
                                    <option value="">Pilih Status Modal</option>
                                    @foreach (App\Models\StatusModal::all() as $statusModal)
                                        <option value="{{ $statusModal->id }}">{{ $statusModal->status_modal }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- sektor (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_sektor" class="form-label">Sektor</label>
                                <select class="form-control" id="id_sektor" name="id_sektor" required>
                                    <option value="">Pilih Status Modal</option>
                                    @foreach (App\Models\Sektor::all() as $sektor)
                                        <option value="{{ $sektor->id }}">{{ $sektor->sektor }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <!-- Alamat Perusahaan -->
                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                        <textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Telp Perusahaan -->
                            <div class="mb-3">
                                <label for="telp_perusahaan" class="form-label">Telepon Perusahaan</label>
                                <input type="text" class="form-control" id="telp_perusahaan" name="telp_perusahaan"
                                    value="+62">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Email Perusahaan -->
                            <div class="mb-3">
                                <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                                <input type="email" class="form-control" id="email_perusahaan"
                                    name="email_perusahaan" required>
                            </div>
                        </div>
                    </div>

                    <!-- KBLI -->
                    <div class="mb-3">
                        <label for="kbli" class="form-label">KBLI</label>
                        <input type="text" class="form-control" id="kbli" name="kbli" value="-">
                    </div>

                    <!-- Tanggal Pendaftaran -->
                    <div class="mb-3">
                        <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" class="form-control" id="tanggal_pendaftaran"
                            name="tanggal_pendaftaran" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- No TDP -->
                            <div class="mb-3">
                                <label for="no_tdp" class="form-label">No TDP</label>
                                <input type="text" class="form-control" id="no_tdp" name="no_tdp"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- No Akta -->
                            <div class="mb-3">
                                <label for="no_akta" class="form-label">No Akta</label>
                                <input type="text" class="form-control" id="no_akta" name="no_akta"
                                    value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Nama Pemilik -->
                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                                    required>
                            </div>

                            <!-- Alamat Pemilik -->
                            <div class="mb-3">
                                <label for="alamat_pemilik" class="form-label">Alamat Pemilik</label>
                                <textarea class="form-control" id="alamat_pemilik" name="alamat_pemilik" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <!-- Nama Pengurus -->
                            <div class="mb-3">
                                <label for="nama_pengurus" class="form-label">Nama Pengurus</label>
                                <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus"
                                    required>
                            </div>

                            <!-- Alamat Pengurus -->
                            <div class="mb-3">
                                <label for="alamat_pengurus" class="form-label">Alamat Pengurus</label>
                                <textarea class="form-control" id="alamat_pengurus" name="alamat_pengurus" required></textarea>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveCustomerBtn">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="customersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Tambah Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for Create and Edit -->
                <form id="createUserForm">
                    <!-- Nama Perusahaan -->
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="create_nama_perusahaan"
                            name="nama_perusahaan" required>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Status Perusahaan (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_status_perusahaan" class="form-label">Status Perusahaan</label>
                                <select class="form-control" id="create_id_status_perusahaan"
                                    name="id_status_perusahaan" required>
                                    <option value="">Pilih Status</option>
                                    @foreach (App\Models\StatusPerusahaan::all() as $statusPerusahaan)
                                        <option value="{{ $statusPerusahaan->id }}">{{ $statusPerusahaan->status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Skala Objek Pengawasan (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_skala_objek_pengawasan" class="form-label">Skala Objek
                                    Pengawasan</label>
                                <select class="form-control" id="create_id_skala_objek_pengawasan"
                                    name="id_skala_objek_pengawasan" required>
                                    <option value="">Pilih Skala</option>
                                    @foreach (App\Models\SkalaObjekPengawasan::all() as $skala)
                                        <option value="{{ $skala->id }}">{{ $skala->skala_objek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Kode WLKP -->
                            <div class="mb-3">
                                <label for="kode_wlkp" class="form-label">Kode WLKP</label>
                                <input type="text" class="form-control" id="create_kode_wlkp" name="kode_wlkp"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <!-- Kepemilikan Perusahaan (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_kepemilikan_perusahaan" class="form-label">Kepemilikan
                                    Perusahaan</label>
                                <select class="form-control" id="create_id_kepemilikan_perusahaan"
                                    name="id_kepemilikan_perusahaan" required>
                                    <option value="">Pilih Kepemilikan</option>
                                    @foreach (App\Models\KepemilikanPerusahaan::all() as $kepemilikan)
                                        <option value="{{ $kepemilikan->id }}">{{ $kepemilikan->kepemilikan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status Modal (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_status_modal" class="form-label">Status Modal</label>
                                <select class="form-control" id="create_id_status_modal" name="id_status_modal"
                                    required>
                                    <option value="">Pilih Status Modal</option>
                                    @foreach (App\Models\StatusModal::all() as $statusModal)
                                        <option value="{{ $statusModal->id }}">{{ $statusModal->status_modal }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- sektor (Foreign Key) -->
                            <div class="mb-3">
                                <label for="id_status_modal" class="form-label">Sektor</label>
                                <select class="form-control" id="create_id_sektor" name="id_sektor" required>
                                    <option value="">Pilih Sektor</option>
                                    @foreach (App\Models\Sektor::all() as $sektor)
                                        <option value="{{ $sektor->id }}">{{ $sektor->sektor }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <!-- Alamat Perusahaan -->
                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                        <textarea class="form-control" id="create_alamat_perusahaan" name="alamat_perusahaan" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Telp Perusahaan -->
                            <div class="mb-3">
                                <label for="telp_perusahaan" class="form-label">Telepon Perusahaan</label>
                                <input type="text" class="form-control" id="create_telp_perusahaan"
                                    name="telp_perusahaan" value="+62">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Email Perusahaan -->
                            <div class="mb-3">
                                <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                                <input type="email" class="form-control" id="create_email_perusahaan"
                                    name="email_perusahaan" required>
                            </div>
                        </div>
                    </div>

                    <!-- KBLI -->
                    <div class="mb-3">
                        <label for="kbli" class="form-label">KBLI</label>
                        <input type="text" class="form-control" id="create_kbli" name="kbli" value="-">
                    </div>

                    <!-- Tanggal Pendaftaran -->
                    <div class="mb-3">
                        <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" class="form-control" id="create_tanggal_pendaftaran"
                            name="tanggal_pendaftaran" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- No TDP -->
                            <div class="mb-3">
                                <label for="no_tdp" class="form-label">No TDP</label>
                                <input type="text" class="form-control" id="create_no_tdp" name="no_tdp"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- No Akta -->
                            <div class="mb-3">
                                <label for="no_akta" class="form-label">No Akta</label>
                                <input type="text" class="form-control" id="create_no_akta" name="no_akta"
                                    value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Nama Pemilik -->
                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                                <input type="text" class="form-control" id="create_nama_pemilik"
                                    name="nama_pemilik" required>
                            </div>

                            <!-- Alamat Pemilik -->
                            <div class="mb-3">
                                <label for="alamat_pemilik" class="form-label">Alamat Pemilik</label>
                                <textarea class="form-control" id="create_alamat_pemilik" name="alamat_pemilik" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <!-- Nama Pengurus -->
                            <div class="mb-3">
                                <label for="nama_pengurus" class="form-label">Nama Pengurus</label>
                                <input type="text" class="form-control" id="create_nama_pengurus"
                                    name="nama_pengurus" required>
                            </div>

                            <!-- Alamat Pengurus -->
                            <div class="mb-3">
                                <label for="alamat_pengurus" class="form-label">Alamat Pengurus</label>
                                <textarea class="form-control" id="create_alamat_pengurus" name="alamat_pengurus" required></textarea>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="createCustomerBtn">Save</button>
            </div>
        </div>
    </div>
</div>
