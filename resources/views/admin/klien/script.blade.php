@push('js')
    <script>
        $(function() {
            $('#datatable-customers').DataTable({
                processing: true,
                serverSide: false,
                responsive: false,
                ajax: '{{ url('klien-datatable') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'logo',
                        name: 'logo'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            $('.refresh').click(function() {
                $('#datatable-customers').DataTable().ajax.reload();
            });
            window.editCustomer = function(id) {
                $.ajax({
                    type: 'GET',
                    url: '/klien/edit/' + id,
                    success: function(response) {
                        $('#formCustomerId').val(response.id);
                        $('#nama').val(response.nama);
                        $('#customersModal').modal('show');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            };

            $('#saveCustomerBtn').click(function() {
                $('#saveCustomerBtnSpinner').show();
                $('#saveCustomerBtn').prop('disabled', true);
                var formData = new FormData($('#userForm')[0]);

                $.ajax({
                    type: 'POST',
                    url: '/klien/store',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#saveCustomerBtnSpinner').hide();
                        $('#saveCustomerBtn').prop('disabled', false);
                        alert(response.message);

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
                var formData = new FormData($('#createUserForm')[0]);

                $.ajax({
                    type: 'POST',
                    url: '/klien/store',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#createCustomerBtnSpinner').hide();
                        $('#createCustomerBtn').prop('disabled', false);
                        alert(response.message);

                        $('#createNama').val('');
                        $('#createLogo').val('');
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
                        url: '/klien/delete/' + id,
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
