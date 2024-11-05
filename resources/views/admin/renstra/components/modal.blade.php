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
                <h5 class="modal-title" id="userModalLabel">Update Renstra</h5>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveCustomerBtn">
                    <div class="spinner-grow text-light spinner-grow-sm" id="saveCustomerBtnSpinner" role="status"
                        style="display: none;">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Create -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="customersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Tambah Renstra</h5>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createCustomerBtn">
                            <div class="spinner-grow text-light spinner-grow-sm" id="createCustomerBtnSpinner"
                                role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
