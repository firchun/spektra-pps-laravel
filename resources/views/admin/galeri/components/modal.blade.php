<div class="modal fade" id="customersShowModal" tabindex="-1" aria-labelledby="customersShowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="showFile"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="customersModal" tabindex="-1" aria-labelledby="customersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Update Galeri</h5>
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
                        <label for="formCustomerName" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="formCustomerName" class="form-label">File</label>
                        <input type="file" class="form-control" id="file" name="file" required>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formCustomerName" class="form-label">Jenis</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="Foto">Foto</option>
                                    <option value="Video">Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formCustomerName" class="form-label">Penggunaan</label>
                                <select class="form-control" id="untuk" name="untuk" required>
                                    <option value="Galeri">Galeri</option>
                                    <option value="Slider">Slider</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formCustomerName" class="form-label">Tampilkan</label>
                                <select class="form-control" id="tampilkan" name="tampilkan" required>
                                    <option value="1">Tampilkan</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formCustomerName" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="createKeterangan" class="form-control">-</textarea>

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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Tambah Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- Form for Create -->
                <form id="createUserForm">
                    <!-- Nama Bidang -->
                    <div class="mb-3">
                        <label for="formCustomerName" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="createJudul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="formCustomerName" class="form-label">File</label>
                        <input type="file" class="form-control" id="createFile" name="file" required>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formCustomerName" class="form-label">Jenis</label>
                                <select class="form-control" id="createJenis" name="jenis" required>
                                    <option value="Foto">Foto</option>
                                    <option value="Video">Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formCustomerName" class="form-label">Penggunaan</label>
                                <select class="form-control" id="createUntuk" name="untuk" required>
                                    <option value="Galeri">Galeri</option>
                                    <option value="Slider">Slider</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formCustomerName" class="form-label">Tampilkan</label>
                                <select class="form-control" id="createTampilkan" name="tampilkan" required>
                                    <option value="1">Tampilkan</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formCustomerName" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="createKeterangan" class="form-control">-</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createCustomerBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
