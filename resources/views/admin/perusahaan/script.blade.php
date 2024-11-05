@push('js')
    <script>
        $(function() {
            $('#datatable-customers').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                ajax: '{{ url('perusahaan-datatable') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'nama_perusahaan',
                        name: 'nama_perusahaan'
                    },
                    {
                        data: 'sektor.sektor',
                        name: 'sektor.sektor'
                    },

                    {
                        data: 'nama_pemilik',
                        name: 'nama_pemilik'
                    },
                    {
                        data: 'alamat_perusahaan',
                        name: 'alamat_perusahaan'
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
                    url: '/perusahaan/edit/' + id,
                    success: function(response) {
                        $('#customersModalLabel').text('Edit Customer');
                        $('#formCustomerId').val(response.id);
                        $('#nama_perusahaan').val(response.nama_perusahaan);
                        $('#id_status_perusahaan').val(response.id_status_perusahaan);
                        $('#id_skala_objek_pengawasan').val(response.id_skala_objek_pengawasan);
                        $('#id_kepemilikan_perusahaan').val(response.id_kepemilikan_perusahaan);
                        $('#id_sektor').val(response.id_sektor);
                        $('#id_status_modal').val(response.id_status_modal);
                        $('#kode_wlkp').val(response.kode_wlkp);
                        $('#slug').val(response.slug);
                        $('#alamat_perusahaan').val(response.alamat_perusahaan);
                        $('#telp_perusahaan').val(response.telp_perusahaan);
                        $('#kbli').val(response.kbli);
                        $('#tanggal_pendaftaran').val(response.tanggal_pendaftaran);
                        $('#email_perusahaan').val(response.email_perusahaan);
                        $('#no_tdp').val(response.no_tdp);
                        $('#no_akta').val(response.no_akta);
                        $('#nama_pemilik').val(response.nama_pemilik);
                        $('#alamat_pemilik').val(response.alamat_pemilik);
                        $('#nama_pengurus').val(response.nama_pengurus);
                        $('#alamat_pengurus').val(response.alamat_pengurus);
                        $('#jumlah_karyawan_laki').val(response.jumlah_karyawan_laki);
                        $('#jumlah_karyawan_perempuan').val(response.jumlah_karyawan_perempuan);
                        $('#jumlah_tka').val(response.jumlah_tka);
                        $('#jumlah_tkl').val(response.jumlah_tkl);
                        $('#jumlah_oap').val(response.jumlah_oap);
                        $('#jumlah_mk_laki').val(response.jumlah_mk_laki);
                        $('#jumlah_mk_perempuan').val(response.jumlah_mk_perempuan);
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
                    url: '/perusahaan/store',
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
                    url: '/perusahaan/store',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#create_nama_perusahaan').val('');
                        $('#create_id_status_perusahaan').val('');
                        $('#create_id_skala_objek_pengawasan').val('');
                        $('#create_id_kepemilikan_perusahaan').val('');
                        $('#create_id_status_modal').val('');
                        $('#create_kode_wlkp').val('');
                        $('#create_alamat_perusahaan').val('');
                        $('#create_telp_perusahaan').val('');
                        $('#create_kbli').val('');
                        $('#create_tanggal_pendaftaran').val('');
                        $('#create_email_perusahaan').val('');
                        $('#create_no_tdp').val('');
                        $('#create_no_akta').val('');
                        $('#create_nama_pemilik').val('');
                        $('#create_alamat_pemilik').val('');
                        $('#create_nama_pengurus').val('');
                        $('#create_alamat_pengurus').val('');
                        $('#create_jumlah_karyawan_laki').val('');
                        $('#create_jumlah_karyawan_perempuan').val('');
                        $('#create_jumlah_tka').val('');
                        $('#create_jumlah_tkl').val('');
                        $('#create_jumlah_oap').val('');
                        $('#create_jumlah_mk_laki').val('');
                        $('#create_jumlah_mk_perempuan').val('');
                        $('#datatable-customers').DataTable().ajax.reload();
                        $('#create').modal('hide');
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
                        url: '/perusahaan/delete/' + id,
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
