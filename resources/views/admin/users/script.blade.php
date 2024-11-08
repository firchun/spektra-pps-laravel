@push('js')
    <script>
        $(function() {
            $('#datatable-users').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ url('users-datatable', $role) }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },

                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
            $('.refresh').click(function() {
                $('#datatable-users').DataTable().ajax.reload();
            });
            $('.create-new').click(function() {
                $('#create').modal('show');
            });
            window.editUser = function(id) {
                $.ajax({
                    type: 'GET',
                    url: '/users/edit/' + id,
                    success: function(response) {
                        $('#formUserId').val(response.id);
                        $('#formUserName').val(response.name);
                        $('#formUserEmail').val(response.email);
                        $('#formIdKabupaten').val(response.id_kabupaten);
                        $('#UsersModal').modal('show');
                        $('#datatable-users').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            };
            $('#saveUserBtn').click(function() {
                var formData = $('#userForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/users/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        // Refresh DataTable setelah menyimpan perubahan
                        $('#datatable-users').DataTable().ajax.reload();
                        $('#UsersModal').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
            $('#createUserBtn').click(function() {
                var formData = $('#createUserForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/users/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#formCreateUserName').val('');
                        $('#formCreateUserEmail').val('');
                        $('#formCreateIdKabupaten').val('');
                        $('#datatable-users').DataTable().ajax.reload();
                        $('#create').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });

            window.deleteUser = function(id) {
                if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/users/delete/' + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message);
                            // Refresh DataTable setelah menghapus pengguna
                            $('#datatable-users').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                }
            };
        });
    </script>
@endpush
