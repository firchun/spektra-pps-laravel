@push('js')
    <script>
        $(function() {
            $('#datatable-customers').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                ajax: '{{ url('galeri-datatable') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'file',
                        name: 'file'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },

                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'untuk',
                        name: 'untuk'
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
                    url: '/galeri/edit/' + id,
                    success: function(response) {
                        $('#formCustomerId').val(response.id);
                        $('#judul').val(response.judul);
                        $('#untuk').val(response.untuk);
                        $('#jenis').val(response.jenis);
                        $('#keterangan').val(response.keterangan);
                        $('#tampilkan').val(response.tampilkan);
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
                    url: '/galeri/edit/' + id,
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
                $('#saveCustomerBtnSpinner').show();
                $('#saveCustomerBtn').prop('disabled', true);
                var formData = $('#userForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/galeri/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#saveCustomerBtnSpinner').hide();
                        $('#saveCustomerBtn').prop('disabled', false);
                        alert(response.message);
                        // Refresh DataTable setelah menyimpan perubahan
                        $('#datatable-customers').DataTable().ajax.reload();
                        $('#customersModal').modal('hide');
                    },
                    error: function(xhr) {
                        $('#saveCustomerBtnSpinner').hide();
                        $('#saveCustomerBtn').prop('disabled', false);
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
            $('#createCustomerBtn').click(function() {
                $('#createCustomerBtnSpinner').show();
                $('#createCustomerBtn').prop('disabled', true);
                var formData = new FormData($('#createUserForm')[0]); // Use FormData to handle file uploads

                $.ajax({
                    type: 'POST',
                    url: '/galeri/store',
                    data: formData,
                    processData: false, // Don't process data, let FormData handle it
                    contentType: false, // Don't set content type, FormData sets it automatically
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#createCustomerBtnSpinner').hide();
                        $('#createCustomerBtn').prop('disabled', false);
                        alert(response.message);
                        $('#createJudul').val('');
                        $('#createFile').val('');
                        $('#createJenis').val('');
                        $('#createUntuk').val('');
                        $('#createKeterangan').val('');
                        $('#createTampilkan').val('');
                        $('#datatable-customers').DataTable().ajax.reload();
                        $('#create').modal('hide');
                    },
                    error: function(xhr) {
                        $('#createCustomerBtnSpinner').hide();
                        $('#createCustomerBtn').prop('disabled', false);
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
            window.deleteCustomers = function(id) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/galeri/delete/' + id,
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
