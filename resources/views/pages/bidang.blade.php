@extends('layouts.frontend.app')
@push('css')
    <style>
        .featured-services .service-item:hover:before {
            border-radius: 20px !important;
        }
    </style>
@endpush
@section('content')
    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>BIDANG</h2>
            <p><span>Bidang </span> <span class="description-title">& Tugas</span></p>
        </div><!-- End Section Title -->
        <div class="container">

            <div class="row justify-content-center">
                @foreach (App\Models\Bidang::all() as $item)
                    <div class="col-12 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative" style="border-radius:20px;">
                            <div class="icon"><i class="bi bi-archive icon"></i></div>
                            <h4><a href="#" class="stretched-link">Bidang : {{ $item->nama_bidang }}</a></h4>
                            <p>{{ $item->keterangan_bidang }}</p>
                        </div>
                    </div><!-- End Service Item -->
                @endforeach
            </div>

        </div>

    </section><!-- /Featured Services Section -->
@endsection
