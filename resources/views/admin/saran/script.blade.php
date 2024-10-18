@push('js')
    <script>
        $(function() {
            $('#datatable-customers').DataTable({
                processing: true,
                serverSide: false,
                responsive: false,
                ajax: '{{ url('saran-datatable') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'saran',
                        name: 'saran'
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
            window.detail = function(id) {
                $.ajax({
                    type: 'GET',
                    url: '/saran/detail/' + id,
                    success: function(response) {
                        console.log(response);
                        $('#customersModal').modal('show');
                        $('#isi_saran').text(response.isi_saran);
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            };
            window.deleteCustomers = function(id) {
                if (confirm('Apakah Anda yakin ingin menghapus saran ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/saran/delete/' + id,
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
