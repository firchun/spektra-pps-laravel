@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    <div class="dt-action-buttons text-end pt-3 pt-md-0 mb-4">
        <div class=" btn-group " role="group">
            <button class="btn btn-secondary refresh btn-default" type="button">
                <span>
                    <i class="bi bi-arrow-clockwise me-sm-1"> </i>
                    <span class="d-none d-sm-inline-block"> Refresh Data</span>
                </span>
            </button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-box mb-30">
                <div class="card-body">
                    <h4>Tambah Data</h4>
                    <form id="createUserForm" enctype="multipart/form-data">
                        <div class="my-3">
                            <label>Nama Instansi / Perusahaan</label>
                            <input type="text" name="nama" id="createNama" class="form-control" autofocus>
                        </div>
                        <div class="my-3">
                            <label>Logo Instansi / Perusahaan</label>
                            <input type="file" name="logo" id="createLogo" class="form-control">
                        </div>
                        <button type="button" id="createCustomerBtn" class="btn btn-primary">
                            <div class="spinner-grow text-light spinner-grow-sm" id="saveCustomerBtnSpinner" role="status"
                                style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <i class="bi bi-plus"></i>
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-box mb-30">
                <div class="card-body">
                    <h3>{{ $title }}</h3>
                </div>
                <table id="datatable-customers" class="table table-hover  display mb-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @include('admin.klien.components.modal')
@endsection
@include('admin.klien.script')
