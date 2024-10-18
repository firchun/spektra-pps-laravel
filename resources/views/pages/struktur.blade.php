@extends('layouts.frontend.app')
@section('content')
    @php
        $setting = App\Models\Setting::latest()->first();
    @endphp
    <section id="about" class="about section light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>STRUKTUR</h2>
            <p><span>Struktur </span> <span class="description-title">Dinas</span></p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ $setting->struktur_dinas ? Storage::url($setting->struktur_dinas) : asset('img/default.webp') }}"
                        alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
