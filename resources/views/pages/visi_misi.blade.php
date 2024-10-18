@extends('layouts.frontend.app')
@section('content')
    @php
        $setting = App\Models\Setting::latest()->first();
    @endphp
    <!-- About Section -->
    <section id="about" class="about section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>VISI & MISI</h2>
            <p><span>Visi </span> <span class="description-title">Misi</span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-3">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <h3>VISI</h3>
                        <p class="fst-italic">
                            {{ $setting->visi }}
                        </p>

                    </div>

                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <h3>MISI</h3>
                        <p class="fst-italic">
                            {!! $setting->misi !!}
                        </p>

                    </div>

                </div>
            </div>

        </div>

    </section><!-- /About Section -->
@endsection
