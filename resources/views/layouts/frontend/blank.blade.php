<!DOCTYPE html>
<html lang="en">

<head>
    {{-- meta --}}
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Disnakertrans Papua Selatan">
    <meta name="keywords" content="Dinas Ketenagakerjaan Papua Selatan, Papua Selatan, SDM Papua selatan">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Disnakertrans Papua Selatan">
    <meta property="og:description" content="Dinas Ketenagakerjaan Papua Selatan, Papua Selatan, SDM Papua selatan">
    <meta property="og:image" content="{{ asset('frontend_theme') }}/assets/img/logo.png">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Disnakertrans Papua Selatan' }}">
    <meta name="twitter:description" content="Dinas Ketenagakerjaan Papua Selatan, Papua Selatan, SDM Papua selatan}">
    <meta name="twitter:image" content="{{ asset('frontend_theme') }}/assets/img/logo.png">


    <title>Disnakertrans Papua Selatan</title>
    <!-- Favicons -->
    <link href="{{ asset('frontend_theme') }}/assets/img/logo.png" rel="icon">
    <link href="{{ asset('frontend_theme') }}/assets/img/logo.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend_theme') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend_theme') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend_theme') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('frontend_theme') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend_theme') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('frontend_theme') }}/assets/css/main.css" rel="stylesheet">
    @stack('css')

</head>


<body class="index-page">

    @include('layouts.frontend.blank_menu')

    <main class="main">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>
    <!-- Clients Section -->
    @php
        $clients = App\Models\Klien::all();
        $clientCount = $clients->count();
    @endphp

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

        <div class="container">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "spaceBetween": 40
                    },
                    "480": {
                      "slidesPerView": 3,
                      "spaceBetween": 60
                    },
                    "640": {
                      "slidesPerView": 4,
                      "spaceBetween": 80
                    },
                    "992": {
                      "slidesPerView": 6,
                      "spaceBetween": 120
                    }
                    
                  }
                  
                }
            </script>
                <div class="swiper-wrapper align-items-center">
                    @foreach ($clients as $item)
                        <div class="swiper-slide d-flex justify-content-center">
                            <img src="{{ Storage::url($item->logo) }}" class="img-fluid client-logo"
                                alt="{{ $item->nama }}">
                        </div>
                    @endforeach

                    @if ($clientCount < 6)
                        @foreach ($clients as $item)
                            <!-- Duplicate slides if there are fewer than 6 -->
                            <div class="swiper-slide d-flex justify-content-center">
                                <img src="{{ Storage::url($item->logo) }}" class="img-fluid client-logo"
                                    alt="{{ $item->nama }}">
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Pagination -->
            </div>
            <div class="swiper-pagination" style=" position: relative; margin-top: 20px;  text-align: center;">
            </div>
        </div>
    </section>
    <!-- /Clients Section -->
    {{-- @include('layouts.frontend.footer') --}}


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    {{-- <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div> --}}

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend_theme') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend_theme') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('frontend_theme') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('frontend_theme') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('frontend_theme') }}/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{ asset('frontend_theme') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('frontend_theme') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend_theme') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend_theme') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('frontend_theme') }}/assets/js/main.js"></script>
    @stack('js')

    <script type="text/javascript">
        $(document).ready(function() {
            // Get CSRF token for AJAX request
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Prepare visitor data
            var visitorData = {
                data: {
                    page_visited: window.location.href,
                    visit_time: new Date().toLocaleString(),
                    additional_info: ''
                }
            };

            // Send AJAX request to store visitor data
            $.ajax({
                url: "{{ route('pengunjung.store') }}", // URL to store data
                type: "POST", // HTTP method
                contentType: 'application/json', // Set content type to JSON
                data: JSON.stringify(visitorData), // Convert the object to a JSON string
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Add CSRF token to request header
                },
                success: function(response) {
                    // console.log(response.message); // Log success message
                },
                error: function(xhr, status, error) {
                    // console.error('Error storing visitor data:', error); // Log error
                }
            });
        });
    </script>
</body>

</html>
