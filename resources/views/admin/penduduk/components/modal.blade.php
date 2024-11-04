<!-- Modal for Create and Edit -->
<div class="modal fade" id="customersModal" tabindex="-1" aria-labelledby="customersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Update Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for Create and Edit -->
                <form id="userForm">
                    <input type="hidden" id="formCustomerId" name="id">

                    <!-- Nama Bidang -->
                    <div class="mb-3">
                        <label for="formCustomerName" class="form-label">Nama Bidang</label>
                        <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" required>
                    </div>

                    <!-- Nama Kepala Bidang -->
                    <div class="mb-3">
                        <label for="formCustomerPhone" class="form-label">Nama Kepala Bidang</label>
                        <input type="text" class="form-control" id="nama_kepala_bidang" name="nama_kepala_bidang"
                            required>
                    </div>

                    <!-- Keterangan Bidang -->
                    <div class="mb-3">
                        <label for="formCustomerAddress" class="form-label">Keterangan Bidang</label>
                        <textarea class="form-control" id="keterangan_bidang" name="keterangan_bidang" rows="3" required></textarea>
                    </div>

                    <!-- Jumlah Pegawai -->
                    <div class="mb-3">
                        <label for="formJmlhPegawai" class="form-label">Jumlah Pegawai</label>
                        <input type="number" class="form-control" id="jmlh_pegawai" name="jmlh_pegawai" required>
                    </div>

                    <!-- Logo Bidang (Optional) -->
                    <div class="mb-3">
                        <label for="formLogoBidang" class="form-label">Logo Bidang (Optional)</label>
                        <input type="file" class="form-control" id="formLogoBidang" name="logo_bidang">
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

<!-- Modal for Create -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="customersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Tambah Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- Form for Create -->
                <form id="createUserForm">
                    <!-- Nama Bidang -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Nama Bidang</label>
                        <input type="text" class="form-control" id="createNamaBidang" name="nama_bidang" required>
                    </div>

                    <!-- Nama Kepala Bidang -->
                    <div class="mb-3">
                        <label for="createNamaKepalaBidang" class="form-label">Nama Kepala Bidang</label>
                        <input type="text" class="form-control" id="createNamaKepalaBidang" name="nama_kepala_bidang"
                            required>
                    </div>

                    <!-- Keterangan Bidang -->
                    <div class="mb-3">
                        <label for="createKeteranganBidang" class="form-label">Keterangan Bidang</label>
                        <textarea class="form-control" id="createKeteranganBidang" name="keterangan_bidang" rows="3" required></textarea>
                    </div>

                    <!-- Jumlah Pegawai -->
                    <div class="mb-3">
                        <label for="createJmlhPegawai" class="form-label">Jumlah Pegawai</label>
                        <input type="number" class="form-control" id="createJmlhPegawai" name="jmlh_pegawai"
                            required>
                    </div>

                    <!-- Logo Bidang (Optional) -->
                    <div class="mb-3">
                        <label for="createLogoBidang" class="form-label">Logo Bidang (Optional)</label>
                        <input type="file" class="form-control" id="createLogoBidang" name="logo_bidang">
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
