@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-box mb-30">
                <div class="card-body">
                    <h2>{{ $title }}</h2>
                </div>
                <table id="datatable-customers" class="table table-hover  display mb-3">
                    <thead>
                        <tr>
                        <tr>
                            <th>ID</th>
                            <th>Distrik</th>
                            <th>Luas Kawasan</th>
                            <th>Penduduk</th>
                            <th>Penduduk Produktif</th>
                            <th>Penduduk Pengangguran</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                        <tr>
                            <th>ID</th>
                            <th>Distrik</th>
                            <th>Luas Kawasan</th>
                            <th>Penduduk</th>
                            <th>Penduduk Produktif</th>
                            <th>Penduduk Pengangguran</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function() {
            $('#datatable-customers').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
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
                        data: 'jumlah_produktif',
                        name: 'jumlah_produktif'
                    },
                    {
                        data: 'jumlah_pengangguran',
                        name: 'jumlah_pengangguran'
                    },

                ]
            });
        });
    </script>
@endpush
