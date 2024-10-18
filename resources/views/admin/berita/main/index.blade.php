@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    <div class="dt-action-buttons text-end pt-3 pt-md-0 mb-4">
        <div class=" btn-group " role="group">
            <button class="btn btn-secondary refresh btn-default" type="button">
                <span>
                    <i class="bi bi-arrow-clockwise me-sm-1"> </i>
                    <span class="d-none d-sm-inline-block"></span>
                </span>
            </button>
            <a href="{{ route('berita.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i> Buat Berita
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-box mb-30">
                <div class="card-body">
                    <h3>{{ $title }}</h3>
                </div>
                <table id="datatable-customers" class="table table-hover  display mb-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Publish</th>
                            <th>Author</th>
                            <th>Pengunjung</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Publish</th>
                            <th>Author</th>
                            <th>Pengunjung</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @include('admin.berita.main.components.modal')
@endsection
@include('admin.berita.main.script')
