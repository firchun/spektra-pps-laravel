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
                <form id="userForm" enctype="multipart/form-data">
                    <input type="hidden" id="formCustomerId" name="id">

                    <div class="my-3">
                        <label>Nama Instansi / Perusahaan</label>
                        <input type="text" name="nama" id="nama" class="form-control" autofocus>
                    </div>
                    <div class="my-3">
                        <label>Logo Instansi / Perusahaan</label>
                        <input type="file" name="logo" id="logo" class="form-control">
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
