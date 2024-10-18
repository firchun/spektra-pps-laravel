@extends('layouts.frontend.app')
@section('content')
    @php
        $setting = App\Models\Setting::latest()->first();
    @endphp
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1>Selamat Datang di
                    </h1>
                    <p class="text-primary">Dinas Tenaga Kerja, Transmigrasi, Energi dan Sumber Daya Mineral Papua
                        Selatan</p>
                    <div class="d-flex">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                            class="glightbox btn btn-outline-primary btn-lg"><i class="bi bi-play-circle"></i><span
                                class="mx-2"> Watch
                                Video</span></a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

        <div class="container">

            <div class="row justify-content-center">
                @foreach (App\Models\Bidang::all() as $item)
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-archive icon"></i></div>
                            <h4><a href="{{ url('/bidang') }}" class="stretched-link">{{ $item->nama_bidang }}</a></h4>
                            <p>{{ Str::limit($item->keterangan_bidang, 100) }}</p>
                        </div>
                    </div><!-- End Service Item -->
                @endforeach
            </div>

        </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Sambutan</h2>
            <p><span>Sambutan </span> <span class="description-title">Kepala Dinas</span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-3 justify-content-center">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ $setting->foto_dinas ? Storage::url($setting->foto_dinas) : asset('img/default.webp') }}"
                        alt="" class="img-fluid shadow-lg" style="border-radius: 20px;">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <h3>{{ $setting->nama_kadis }}</h3>
                        <p class="fst-italic">
                            {{ Str::limit($setting->sambutan_kadis, 200) }}
                        </p>
                        <div class="my-2">
                            <a href="{{ url('sambutan') }}" class="btn btn-primary">Baca Selengkapnya..</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </section><!-- /About Section -->



    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center">

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-richtext"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Kabupaten</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-richtext"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Perusahaan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-richtext"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Berita</p>
                    </div>
                </div>



            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Berita</h2>
            <p><span>Check berita</span> <span class="description-title">Terbaru</span></p>
        </div><!-- End Section Title -->

        <div class="container">

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

                <div class="col-12 text-center">
                    <a href="{{ url('semua-berita') }}" class="btn btn-primary btn-lg">Berita Lainnya</a>
                </div>
            </div>
        </div>

    </section>
    <!-- /Services Section -->
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
