@extends('layouts.frontend.app')
@section('content')
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Berita</h2>
            <p class="my-3"><span>{{ $title }}</span></p>
            <small class="text-primary p-2 d-block text-center"
                style="width:100%; background-color: color-mix(in srgb, var(--accent-color), transparent 90%); 
        border-radius:10px;">
                <i class=" bi bi-calendar-date"></i>
                {{ $berita->created_at->diffForHumans() }} / {{ $berita->created_at->format('d-m-Y') }}
                <i class=" bi bi-archive" style="margin-left:20px;"></i> {{ $berita->kategori->kategori }}
                <i class=" bi bi-person" style="margin-left:20px;"></i> {{ $berita->user->name }}
            </small>
        </div><!-- End Section Title -->

        <div class="container px-4" style="margin-bottom:50px;">
            <div class="text-center py-3">
                <img src="{{ $berita->foto ? Storage::url($berita->foto) : asset('img/default.webp') }}"class=" mb-4"
                    alt="foto berita" style="max-height: 400px; object-fit:cover;">
            </div>
            {!! $berita->isi_berita !!}
            <hr>
        </div>
        <div class="container section-title pb-2" data-aos="fade-up">
            <h2>Saran Berita</h2>
        </div><!-- End Section Title -->
        @if ($berita_lainnya->count() != 0)
            <div class="row  justify-content-center">
                @foreach ($berita_lainnya as $item)
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


            </div>
        @endif
    </section>
@endsection
