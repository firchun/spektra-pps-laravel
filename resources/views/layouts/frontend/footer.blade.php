<footer id="footer" class="footer">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-4 footer-about">
                <img alt="logo" src="{{ asset('frontend_theme') }}/assets/img/logo.png" style="height: 50px;">
                @php
                    $setting = App\Models\Setting::latest()->first();
                @endphp
                <div class="footer-contact pt-3">
                    <p>{{ $setting->alamat_dinas }}</p>
                    <p class="mt-3"><strong>Telp.:</strong> <span>{{ $setting->telp }}</span></p>
                    <p><strong>Email:</strong>
                        <span><a href="mailto:{{ $setting->email_dinas }}"
                                style="font-size: 14px;">{{ $setting->email_dinas }}</a></span>
                    </p>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Link Terkait</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/data-renstra') }}">Renstra</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/kontak') }}">Kontak</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/kotak-saran') }}">Kotak Saran</a></li>
                    @guest
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('login') }}">Login</a></li>
                    @else
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}">Dashboard</a></li>
                    @endguest
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 footer-links">
                <h4>Profil Kami</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/sambutan') }}">Sambutan Kepala Dinas</a>
                    </li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/visi-misi') }}">Visi & Misi Dinas</a>
                    </li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/struktur') }}">Struktur Dinas</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/bidang') }}">Bidang & Tugas</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 footer-links">
                @php
                    $pengunjung_berita = App\Models\Berita::sum('pengunjung');
                    $buka_renstra = App\Models\Renstra::sum('jmlh_view');
                    $download_renstra = App\Models\Renstra::sum('jmlh_download');
                    $total = App\Models\Pengunjung::count();
                    $today = App\Models\Pengunjung::whereDate('created_at', \Carbon\Carbon::today())->count();
                @endphp
                <h4>Pengunjung</h4>
                <ul>
                    <li><i class="bi bi-bar-chart-line-fill"></i>Total : {{ number_format($total) }}</li>
                    <li><i class="bi bi-bar-chart-line-fill"></i>Hari ini :
                        {{ number_format($today) }}</li>
                    <li><i class="bi bi-bar-chart-line-fill"></i> Berita :
                        {{ number_format($pengunjung_berita) }}</li>
                </ul>
            </div>



        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> {{ date('Y') }} <strong class="px-1 sitename">{{ env('APP_NAME') }}</strong>
            <span>All Rights Reserved</span>
        </p>
    </div>

</footer>
