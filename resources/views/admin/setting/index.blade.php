@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    <form action="{{ route('setting.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Nama Kepala Dinas</h3>
                <p>Silahkan memasukkan nama lengkap kepala dinas beserta titlenya.</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <label>Nama Kelapa Dinas</label>
                        <input type="text" name="nama_kadis" autofocus class="form-control"
                            value="{{ $setting->nama_kadis }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Sambutan Kepala Dinas</h3>
                <p>Silahkan mengisi sambutan kepala dinas</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <label>Sambutan Kelapa Dinas</label>
                        <textarea name="sambutan_kadis" class="form-control">{{ $setting->sambutan_kadis }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Visi Dinas</h3>
                <p>Silahkan mengisi visi dari dinas</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <label>Visi Dinas</label>
                        <textarea name="visi" class="form-control">{{ $setting->visi }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Misi Dinas</h3>
                <p>Silahkan mengisi Misi dari dinas</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <label>Misi Dinas</label>
                        <textarea name="misi" class="form-control">{{ $setting->misi }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Alamat Kantor Dinas</h3>
                <p>Silahkan mengisi alamat dari dinas</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <label>Alamat Kantor Dinas</label>
                        <textarea name="alamat_dinas" class="form-control">{{ $setting->alamat_dinas }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Kontak Dinas</h3>
                <p>Silahkan mengisi kontak dari dinas</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Email Dinas</label>
                            <input type="email" class="form-control" name="email_dinas"
                                value="{{ $setting->email_dinas }}">
                        </div>
                        <div class="mb-3">
                            <label>Telephone/HP/WA Dinas</label>
                            <input type="text" class="form-control" name="telp" value="{{ $setting->telp }}">
                        </div>
                        <div class="mb-3">
                            <label>Fax Dinas</label>
                            <input type="text" class="form-control" name="fax" value="{{ $setting->fax }}">
                        </div>
                        <div class="mb-3">
                            <label>Embed Google maps</label><br>
                            <small><b>Pengambilan peta :</b> Buka google maps -> klik lokasi -> share lokasi -> pilih "
                                Embed a maps " -> copy
                                html</small><br>
                            <small class="text-danger"><b>Ukuran peta :</b> width : 650 dan height: 350</small>
                            <textarea name="google_maps" class="form-control">{{ $setting->google_maps }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Struktur Dinas</h3>
                <p>Silahkan upload struktur organisasi dinas</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Struktur Dinas</label>
                            <input type="file" name="struktur_dinas" class="form-control">
                        </div>
                        <img src="{{ $setting->struktur_dinas ? Storage::url($setting->struktur_dinas) : asset('img/default.webp') }}"
                            style="max-width: 300px;" alt="struktur dinas">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Foto Kepala Dinas</h3>
                <p>Silahkan upload foto kepala dinas</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Foto Kepala Dinas</label>
                            <input type="file" name="foto_dinas" class="form-control">
                        </div>
                        <img src="{{ $setting->foto_dinas ? Storage::url($setting->foto_dinas) : asset('img/default.webp') }}"
                            style="max-width: 300px;" alt="struktur dinas">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Simpan Perubahan</h3>
                <p>Klik tombol simpan untuk menyimpan perubahan data yang anda lakukan</p>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" id="simpan"><i class="bi bi-floppy"></i> Simpan
                            Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
