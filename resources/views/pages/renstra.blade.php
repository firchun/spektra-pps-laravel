@extends('layouts.frontend.app')
@section('content')
    <section class="section">
        <div class="container">
            <!-- Section Title -->
            <div class="container section-title " data-aos="fade-up">
                <h2>RENSTRA</h2>
                <p><span>File </span> <span class="description-title">Renstra</span></p>
            </div><!-- End Section Title -->

            <div class="row justify-content-center">
                <div class="col-8">

                    <table class="table table-hover">
                        <thead>
                            <th>No</th>
                            <th>Judul</th>
                            <th>File</th>
                        </thead>
                        <tbody>
                            @foreach ($renstra as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td style="width: 30%;">
                                        <div class="button-group">
                                            <button type="button" class="btn btn-primary lihat-file-btn"
                                                data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                data-bs-target="#fileModal-{{ $item->id }}">
                                                <i class="bi bi-files"></i> Lihat File
                                            </button>
                                            <a href="{{ url('/download/' . basename(Storage::url($item->file))) }}"
                                                class="btn btn-success">
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    {{-- modal --}}
    @foreach ($renstra as $item)
        <!-- Modal -->
        <div class="modal fade" id="fileModal-{{ $item->id }}" tabindex="-1" aria-labelledby="fileModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        {{ $item->judul }}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="{{ Storage::url($item->file) }}" style="width:100%; height:500px;"
                            frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.lihat-file-btn').on('click', function() {

                var id = $(this).data('id');
                var url = '/renstra/lihat-file/' + id;
                // Lakukan request AJAX
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {},
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat mengambil file: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
