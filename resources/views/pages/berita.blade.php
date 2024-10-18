@extends('layouts.frontend.app')
@section('content')
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Berita</h2>
            <p>
                @if (!empty($title))
                    <span>{{ $title }}</span>
                @else
                    <span>Berita</span> <span class="description-title">Terbaru</span>
                @endif
            </p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="mb-3">
                @include('pages.partials.search_berita')
            </div>

            <div class="row  justify-content-center">
                @foreach ($berita as $item)
                    <div class=" col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card news-card position-relative border-primary">
                            <img src="{{ asset('img') }}/default.webp" class="card-img-top" alt="Judul Berita">
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold">
                                    <a href="{{ url('/detail-berita', $item->slug) }}"
                                        class="stretched-link lihat-berita-btn"
                                        data-id="{{ $item->id }}">{{ $item->judul }}</a>
                                </h5>
                                <small class="text-primary p-2 d-block text-center"
                                    style="width:100%; background-color: color-mix(in srgb, var(--accent-color), transparent 90%); 
                                border-radius:10px;">
                                    <i class=" bi bi-calendar-date"></i> {{ $item->created_at->diffForHumans() }}
                                    <i class=" bi bi-archive " style="margin-left: 12px;"></i>
                                    {{ $item->kategori->kategori }}
                                </small>
                                <p class="card-text">{!! Str::limit($item->isi_berita, 150) !!}</p>
                                <hr style="margin-bottom: 0.5rem;">
                                <small class="text-primary" style="font-size: 12px;"><i
                                        class="bi bi-bar-chart-line-fill"></i>
                                    {{ number_format($item->pengunjung) }} Kali
                                    dilihat <i class=" bi bi-person" style="margin-left: 12px;"></i>
                                    {{ $item->user->name }}</small>
                            </div>
                        </div><!-- End News Card -->
                    </div>
                @endforeach
                @if ($berita->count() == 0)
                    <div class="col-12 text-center my-4">

                        Belum ada berita
                    </div>
                @endif

            </div>
            <div class="my-4 d-flex justify-content-center">
                {{ $berita->links('vendor.pagination.bootstrap-4') }}

            </div>
        </div>

    </section><!-- /Services Section -->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.lihat-berita-btn').on('click', function() {

                var id = $(this).data('id');
                var url = '/berita/lihat-berita/' + id;
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {},
                });
            });
        });
    </script>
@endpush
