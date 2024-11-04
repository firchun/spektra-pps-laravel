<!-- Modal for Create and Edit -->
<div class="modal fade" id="customersModal" tabindex="-1" aria-labelledby="customersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Update distrik</h5>
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
                        <label for="formCustomerName" class="form-label">Nama distrik</label>
                        <input type="text" class="form-control" id="namaDistrik" name="nama_distrik" required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Luas Kawasan</label>
                        <input type="text" class="form-control" id="luasKawasan" name="luas_kawasan" required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="NamaBidang" class="form-label">Batas Selatan</label>
                        <input type="text" class="form-control" id="batasSelatan" name="batas_selatan" required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="NamaBidang" class="form-label">Batas Utara</label>
                        <input type="text" class="form-control" id="batasUtara" name="batas_utara" required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="NamaBidang" class="form-label">Batas Timur</label>
                        <input type="text" class="form-control" id="batasTimur" name="batas_timur" required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="NamaBidang" class="form-label">Batas Barat</label>
                        <input type="text" class="form-control" id="batasBarat" name="batas_barat" required>
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
                <h5 class="modal-title" id="userModalLabel">Tambah distrik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- Form for Create -->
                <form id="createUserForm">
                    <!-- form -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Nama distrik</label>
                        <input type="text" class="form-control" id="createNamaDistrik" name="nama_distrik" required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Luas Kawasan</label>
                        <input type="text" class="form-control" id="createLuasKawasan" name="luas_kawasan" required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Batas Selatan</label>
                        <input type="text" class="form-control" id="createBatasSelatan" name="batas_selatan"
                            required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Batas Utara</label>
                        <input type="text" class="form-control" id="createBatasUtara" name="batas_utara"
                            required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Batas Timur</label>
                        <input type="text" class="form-control" id="createBatasTimur" name="batas_timur"
                            required>
                    </div>
                    <!-- form -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Batas Barat</label>
                        <input type="text" class="form-control" id="createBatasBarat" name="batas_barat"
                            required>
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
<!-- Modal for Create -->
<div class="modal fade" id="penduduk" tabindex="-1" aria-labelledby="customersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Update Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- Form for Create -->
                <form id="createPendudukForm">
                    <input type="hidden" name="id_distrik" id="idDistrik">
                    <!-- form -->
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Jumlah Total</label>
                        <input type="number" class="form-control" id="pendudukJumlah" name="jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Jumlah Produktif</label>
                        <input type="number" class="form-control" id="pendudukJumlahProduktif"
                            name="jumlah_produktif" required value="0">
                    </div>
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Jumlah Pengangguran Terbuka</label>
                        <input type="number" class="form-control" id="pendudukJumlahPengangguran"
                            name="jumlah_pengangguran" required value="0">
                    </div>
                    <div class="mb-3">
                        <label for="createNamaBidang" class="form-label">Tahun Data</label>
                        <input type="number" class="form-control" id="pendudukTahun" name="tahun" required
                            value="{{ date('Y') }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="createPendudukBtn">Save</button>
            </div>
        </div>
    </div>
</div>
