@push('js')
    <script>
        $(function() {
            $('#datatable-customers').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ url('distrik-datatable') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'nama_distrik',
                        name: 'nama_distrik'
                    },
                    {
                        data: 'luas_kawasan',
                        name: 'luas_kawasan'
                    },
                    {
                        data: 'jumlah_penduduk',
                        name: 'jumlah_penduduk'
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
            window.penduduk = function(id) {
                $('#idDistrik').val(id);
                $('#penduduk').modal('show');
            };
            window.editCustomer = function(id) {
                $.ajax({
                    type: 'GET',
                    url: '/distrik/edit/' + id,
                    success: function(response) {
                        $('#customersModalLabel').text('Edit Customer');
                        $('#formCustomerId').val(response.id);
                        $('#namaDistrik').val(response.nama_distrik);
                        $('#luasKawasan').val(response.luas_kawasan);
                        $('#batasSelatan').val(response.batas_selatan);
                        $('#batasUtara').val(response.batas_utara);
                        $('#batasTimur').val(response.batas_timur);
                        $('#batasBarat').val(response.batas_barat);
                        $('#customersModal').modal('show');
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
                    url: '/distrik/store',
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
                var formData = $('#createUserForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/distrik/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#createNamaDistrik').val('');
                        $('#createLuasKawasan').val('');
                        $('#createBatasSelatan').val('');
                        $('#createBatasUtara').val('');
                        $('#createBatasTimur').val('');
                        $('#createBatasBarat').val('');
                        $('#datatable-customers').DataTable().ajax.reload();
                        $('#create').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
            $('#createPendudukBtn').click(function() {
                var formData = $('#createPendudukForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '/penduduk/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#pendudukJumlah').val('');
                        $('#pendudukJumlahProduktif').val('');
                        $('#pendudukJumlahPengangguran').val('');
                        $('#pendudukTahun').val('');
                        $('#datatable-customers').DataTable().ajax.reload();
                        $('#penduduk').modal('hide');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
            window.deleteCustomers = function(id) {
                if (confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/distrik/delete/' + id,
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
