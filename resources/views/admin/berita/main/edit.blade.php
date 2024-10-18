@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="row">
            <div class="col-12">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <label>Judul Berita</label>
                        <input type="text" name="judul" class="form-control" value="{{ $data->judul }}" autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <label>Isi Berita</label>
                        <textarea name="isi_berita" id="isi_berita">{{ $data->isi_berita }}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Foto Berita</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Publish Berita</label>
                            <select class="form-control" name="tampilkan">
                                <option value="0" @if ($data->tampilkan == 2) selected @endif>Draft</option>
                                <option value="1" @if ($data->tampilkan == 1) selected @endif>Publish</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Kategori Berita</label>
                            <select class="form-control" name="id_kategori_berita">
                                @foreach (App\Models\KategoriBerita::all() as $item)
                                    <option value="{{ $item->id }}" @if ($data->tampilkan == $item->id) selected @endif>
                                        {{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy2"></i> Simpan
                                Berita</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        // Apply CKEditor to textarea
        CKEDITOR.replace('isi_berita', {
            toolbar: [{
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Blockquote']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft',
                        'JustifyCenter', 'JustifyRight', 'JustifyBlock'
                    ]
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                }
            ]
        });
    </script>
@endpush
