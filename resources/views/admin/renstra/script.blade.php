@push('js')
    <script>
        $(function() {
            $('#datatable-customers').DataTable({
                processing: true,
                serverSide: false,
                responsive: false,
                ajax: '{{ url('renstra-datatable') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'jmlh_download',
                        name: 'jmlh_download'
                    },

                    {
                        data: 'jmlh_view',
                        name: 'jmlh_view'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
            $('.create-new').click(function() {
                $('#create').modal('show');
            });
            $('.refresh').click(function() {
                $('#datatable-customers').DataTable().ajax.reload();
            });
            window.editCustomer = function(id) {
                $.ajax({
                    type: 'GET',
                    url: '/renstra/edit/' + id,
                    success: function(response) {
                        $('#formCustomerId').val(response.id);
                        $('#judul').val(response.judul);
                        $('#customersModal').modal('show');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            };
            window.showCustomer = function(id) {
                $.ajax({
                    type: 'GET',
                    url: '/renstra/edit/' + id,
                    success: function(response) {
                        $('#customersShowModal').modal('show');

                        if (response.file) {
                            var fileUrl = "{{ Storage::url('') }}" + response.file;

                            $('#showFile').html('<iframe src="' + fileUrl +
                                '" width="100%" height="600px"></iframe>');
                        } else {
                            // Handle the case where no file is associated with the customer
                            $('#showFile').html('No file available');
                        }
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            };
            $('#saveCustomerBtn').click(function() {
                var formData = $('#userForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/renstra/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        // Refresh DataTable setelah menyimpan perubahan
                        $('#datatable-customers').DataTable().ajax.reload();
                        $('#customersModal').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
            $('#createCustomerBtn').click(function() {
                var formData = new FormData($('#createUserForm')[0]); // Use FormData to handle file uploads

                $.ajax({
                    type: 'POST',
                    url: '/renstra/store',
                    data: formData,
                    processData: false, // Don't process data, let FormData handle it
                    contentType: false, // Don't set content type, FormData sets it automatically
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#createJudul').val('');
                        $('#createFile').val('');
                        $('#datatable-customers').DataTable().ajax.reload();
                        $('#create').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
            window.deleteCustomers = function(id) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/renstra/delete/' + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // alert(response.message);
                            $('#datatable-customers').DataTable().ajax.reload();
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
