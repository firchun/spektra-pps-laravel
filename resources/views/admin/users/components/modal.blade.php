<!-- Modal for Create and Edit -->
<div class="modal fade" id="UsersModal" tabindex="-1" aria-labelledby="UsersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">User Form</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Create and Edit -->
                <form id="userForm">
                    <input type="hidden" id="formUserId" name="id">
                    <div class="mb-3">
                        <label for="formUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="formUserName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="formUserEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="formUserEmail" name="email" required>
                    </div>
                    @if ($role == 'Admin Kabupaten' || $role == 'Kadis Kabupaten')
                        <div class="mb-3">
                            <label for="formUserEmail" class="form-label">Kabupaten</label>
                            <select class="form-control" id="formIdKabupaten" name="id_kabupaten">
                                @foreach (App\Models\Kabupaten::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="formUserRole" class="form-label">Role</label>
                        <input type="text" class="form-control" name="role" value="{{ $role }}" readonly>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveUserBtn">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="UsersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">User Form</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Create and Edit -->
                <form id="createUserForm">
                    <div class="mb-3">
                        <label for="formUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="formCreateUserName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="formUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="formCreateUserEmail" name="email" required>
                    </div>
                    @if ($role == 'Admin Kabupaten' || $role == 'Kadis Kabupaten')
                        <div class="mb-3">
                            <label for="formUserEmail" class="form-label">Email</label>
                            <select class="form-control" id="formCreateIdKabupaten" name="id_kabupaten">
                                @foreach (App\Models\Kabupaten::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kabupaten }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="formUserRole" class="form-label">Role</label>
                        <input type="text" class="form-control" name="role" value="{{ $role }}" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="createUserBtn">Save</button>
            </div>
        </div>
    </div>
</div>
