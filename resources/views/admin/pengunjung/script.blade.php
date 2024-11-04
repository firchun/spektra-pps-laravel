@push('js')
    <script>
        $(function() {
            $('#datatable-customers').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                ajax: '{{ url('pengunjung-datatable') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'data',
                        name: 'data'
                    },

                ],
                dom: 'Bfrtip',
                buttons: [{
                    text: '<i class="bi bi-files"></i> Download Log File',
                    action: function(e, dt, button, config) {

                        $.ajax({
                            url: '{{ url('pengunjung-datatable') }}?export=all',
                            type: 'GET',
                            success: function(response) {
                                let logContent = "";

                                response.data.forEach(row => {
                                    logContent +=
                                        `[ID: ${row.id}] [Tanggal: ${row.tanggal}] [Data: ${row.data}]\n`;
                                });

                                const blob = new Blob([logContent], {
                                    type: "text/plain;charset=utf-8"
                                });
                                const link = document.createElement("a");
                                link.href = URL.createObjectURL(blob);
                                link.download = "data_pengunjung.log";
                                link.click();
                            },
                            error: function() {
                                alert('Failed to fetch all data for export.');
                            }
                        });
                    }
                }]
            });

            $('.refresh').click(function() {
                $('#datatable-customers').DataTable().ajax.reload();
            });
        });
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
@endpush
