<header id="header" class="header sticky-top">

    <div class="topbar">

        <div class="container ">

            <div class=" row align-items-center justify-content-center">
                <div class=" col-lg-2 col-4">
                    <span class="d-flex align-items-center mx-2 text-white fw-bold" style="font-style: normal;">
                        UMP PPS
                        {{ date('Y') }}
                        <i class="bi bi-chevron-double-right px-2"></i>
                    </span>
                </div>
                <div class="col-lg-10 col-8">

                    <div class="my-2 text-white " style="font-style: italic;">
                        <marquee>
                            Upah Minimum Provinsi :
                            @php
                                $ump = App\Models\Ump::latest()->first();
                                $upah_sekarang = $ump->upah;
                                $upah_sebelumnya = App\Models\Ump::where('id', '<', $ump->id)
                                    ->orderBy('id', 'desc')
                                    ->value('upah');

                                // Cek apakah upah sebelumnya tidak kosong atau nol untuk menghindari pembagian nol
                                if ($upah_sebelumnya > 0) {
                                    // Hitung selisih dan persentase perubahan
                                    $selisih = $upah_sekarang - $upah_sebelumnya;
                                    $persentase_perubahan = ($selisih / $upah_sebelumnya) * 100;

                                    // Tentukan apakah itu kenaikan atau penurunan
                                    if ($persentase_perubahan > 0) {
                                        echo 'Rp ' .
                                            number_format($ump->upah) .
                                            ' Mengalami Kenaikan Sebesar : ' .
                                            number_format($persentase_perubahan, 2) .
                                            '%';
                                    } elseif ($persentase_perubahan < 0) {
                                        return 'Rp ' .
                                            number_format($ump->upah) .
                                            ' Mengalami Penurunan Sebesar: ' .
                                            number_format(abs($persentase_perubahan), 2) .
                                            '%';
                                    } else {
                                        echo 'Rp ' . number_format($ump->upah);
                                    }
                                } else {
                                    // Jika upah sebelumnya tidak valid, tampilkan pesan
                                    echo 0;
                                }
                            @endphp
                        </marquee>
                    </div>
                </div>

            </div><!-- End Top Bar -->
        </div>
    </div>
    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('frontend_theme') }}/assets/img/logo.png" alt="" style="height: 100%;">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="dropdown"><a href="#"><span>Profile</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ url('/sambutan') }}"
                                    class="{{ Request::is('sambutan') ? 'text-primary' : '' }}">Sambutan
                                    Kepala Dinas</a></li>
                            <li><a href="{{ url('/visi-misi') }}"
                                    class="{{ Request::is('visi-misi') ? 'text-primary' : '' }}">Visi
                                    dan Misi Dinas</a></li>
                            <li><a href="{{ url('/struktur') }}"
                                    class="{{ Request::is('struktur') ? 'text-primary' : '' }}">Struktur Dinas</a></li>
                            <li><a href="{{ url('/bidang') }}"
                                    class="{{ Request::is('bidang') ? 'text-primary' : '' }}">Bidang dan Tugas</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/semua-berita') }}"
                            class="{{ Request::is('semua-berita') ? 'active' : '' }}">Berita</a>
                    </li>
                    <li><a href="{{ url('/data-renstra') }}"
                            class="{{ Request::is('renstra') ? 'active' : '' }}">Renstra</a></li>
                    <li><a href="{{ url('/kontak') }}" class="{{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
                    </li>
                    <li><a href="{{ url('/kotak-saran') }}"
                            class="{{ Request::is('kotak-saran') ? 'active' : '' }}">Kotak Saran</a></li>
                    <li><a href="{{ url('/galeri') }}" class="{{ Request::is('galeri') ? 'active' : '' }}">Galeri</a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>

    </div>

</header>
