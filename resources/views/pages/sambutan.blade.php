@extends('layouts.frontend.app')
@section('content')
    @php
        $setting = App\Models\Setting::latest()->first();
    @endphp
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
                        <p class="fst-italic" style="width: 70%;">
                            {{ $setting->sambutan_kadis }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->
@endsection
