@extends('layouts.frontend.app')
@section('content')
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <p><span>Lihat Kegiatan kami pada &nbsp;</span><span class="description-title">Galeri</span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-Foto">Foto</li>
                    <li data-filter=".filter-Video">Video</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container " data-aos="fade-up" data-aos-delay="200">
                    @foreach ($galeri as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $item->jenis }}">
                            <img src="{{ Storage::url($item->file) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $item->judul }}</h4>
                                <p>{{ $item->keterangan }}</p>
                                <a href="{{ Storage::url($item->file) }}" title="App 1"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->
@endsection
