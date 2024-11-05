<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Pengaturan letak
            {{-- <span class="btn-block font-weight-400 font-12">User Interface Settings</span> --}}
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-1" checked="" />
                    <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-2" />
                    <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-3" />
                    <label class="custom-control-label" for="sidebaricon-3"><i
                            class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-1" checked="" />
                    <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-2" />
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                            aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-3" />
                    <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-4" checked="" />
                    <label class="custom-control-label" for="sidebariconlist-4"><i
                            class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-5" />
                    <label class="custom-control-label" for="sidebariconlist-5"><i
                            class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-6" />
                    <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">
                    Reset Settings
                </button>
            </div>
        </div>
    </div>
</div>
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('frontend_theme') }}/assets/img/logo.png" alt="" class="dark-logo" />
            <img src="{{ asset('frontend_theme') }}/assets/img/logo.png" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('home') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('home') ? 'active' : '' }}">
                        <span class="micon bi bi-house"></span><span class="mtext">Dashboard
                            {{ Auth::user()->role }}</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'Kadis Provinsi')
                    <li>
                        <a href="{{ url('laporan/distrik') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('laporan/distrik') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Laporan Distrik</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('laporan/penduduk') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('laporan/penduduk') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Laporan Penduduk</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'Kadis Kabupaten')
                    <li>
                        <a href="{{ url('laporan/distrik') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('laporan/distrik') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Laporan Distrik</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('laporan/penduduk') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('laporan/penduduk') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Laporan Penduduk</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'Admin Kabupaten')
                    <li>
                        <a href="{{ url('/distrik-admin/' . Auth::user()->id_kabupaten) }}"
                            class="dropdown-toggle no-arrow {{ request()->is('distrik-admin/' . Auth::user()->id_kabupaten) ? 'active' : '' }}">
                            <span class="micon bi bi-map"></span><span class="mtext">Distrik</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/perusahaan') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('perusahaan') ? 'active' : '' }}">
                            <span class="micon bi bi-buildings"></span><span class="mtext">Perusahaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('laporan/distrik') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('laporan/distrik') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Laporan Distrik</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('laporan/penduduk') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('laporan/penduduk') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Laporan Penduduk</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'Admin Provinsi')
                    <li>
                        <a href="{{ route('kabupaten') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('kabupaten*') ? 'active' : '' }}">
                            <span class="micon bi bi-map"></span><span class="mtext">Kabupaten</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sektor') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('sektor*') ? 'active' : '' }}">
                            <span class="micon bi bi-folder"></span><span class="mtext">Sektor Perusahaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kepemilikan-perusahaan') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('kepemilikan-perusahaan*') ? 'active' : '' }}">
                            <span class="micon bi bi-folder"></span><span class="mtext">Kepemilikan Perusahaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('status-perusahaan') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('status-perusahaan*') ? 'active' : '' }}">
                            <span class="micon bi bi-folder"></span><span class="mtext">Status Perusahaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('skala-objek') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('skala-objek*') ? 'active' : '' }}">
                            <span class="micon bi bi-folder"></span><span class="mtext">Skala Objek</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('status-modal') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('status-modal*') ? 'active' : '' }}">
                            <span class="micon bi bi-cash"></span><span class="mtext">Status Modal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('laporan/distrik') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('laporan/distrik') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Laporan Distrik</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('laporan/penduduk') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('laporan/penduduk') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Laporan Penduduk</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'Operator')
                    <li>
                        <a href="{{ route('data-bidang') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('data-bidang*') ? 'active' : '' }}">
                            <span class="micon bi bi-archive"></span><span class="mtext">Bidang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('klien') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('klien*') ? 'active' : '' }}">
                            <span class="micon bi bi-file-image"></span><span class="mtext">Klien</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('data-galeri') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('data-galeri*') ? 'active' : '' }}">
                            <span class="micon bi bi-image"></span><span class="mtext">Galeri</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ump') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('ump*') ? 'active' : '' }}">
                            <span class="micon bi bi-cash"></span><span class="mtext">Upah Minimum Provinsi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('saran') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('saran*') ? 'active' : '' }}">
                            <span class="micon bi bi-chat-dots"></span><span class="mtext">Kotak Saran</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('renstra') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('renstra*') ? 'active' : '' }}">
                            <span class="micon bi bi-archive"></span><span class="mtext">File Renstra</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-newspaper"></span><span class="mtext">Berita</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('kategori-berita') }}"
                                    class="{{ request()->is('kategori-berita') ? 'active' : '' }}">Kategori</a></li>
                            <li><a href="{{ route('berita') }}"
                                    class="{{ request()->is('berita*') ? 'active' : '' }}">Berita</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('setting') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('setting*') ? 'active' : '' }}">
                            <span class="micon bi bi-gear"></span><span class="mtext">Setting</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'Super Admin')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-people"></span><span class="mtext">Pengguna</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('users.super-admin') }}"
                                    class="{{ request()->is('users/super-admin') ? 'active' : '' }}">Super Admin</a>
                            </li>
                            <li><a href="{{ route('users.admin-provinsi') }}"
                                    class="{{ request()->is('users/admin-provinsi') ? 'active' : '' }}">Admin
                                    Provinsi</a>
                            </li>
                            <li><a href="{{ route('users.admin-kabupaten') }}"
                                    class="{{ request()->is('users/admin-kabupaten') ? 'active' : '' }}">Admin
                                    Kabupaten</a>
                            </li>
                            <li><a href="{{ route('users.operator') }}"
                                    class="{{ request()->is('users/operator') ? 'active' : '' }}">Operator Web</a>
                            </li>
                            <li><a href="{{ route('users.kadis-provinsi') }}"
                                    class="{{ request()->is('users/kadis-provinsi') ? 'active' : '' }}">Kadis
                                    Provinsi</a>
                            </li>
                            <li><a href="{{ route('users.kadis-kabupaten') }}"
                                    class="{{ request()->is('users/kadis-kabupaten') ? 'active' : '' }}">Kadis
                                    Kabupaten</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('pengunjung') }}"
                            class="dropdown-toggle no-arrow {{ request()->is('pengunjung*') ? 'active' : '' }}">
                            <span class="micon bi bi-files"></span><span class="mtext">Pengunjung</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ url('/profile') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('profile*') ? 'active' : '' }}">
                        <span class="micon bi bi-person-circle"></span><span class="mtext">Update Akun</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
