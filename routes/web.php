<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DistrikController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KepemilikanPerusahaanController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RenstraController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\SkalaObjekPengawasanController;
use App\Http\Controllers\StatusModalController;
use App\Http\Controllers\StatusPerusahaanController;
use App\Http\Controllers\UmpController;
use App\Http\Controllers\UserController;
use App\Models\PendudukDistrik;
use App\Models\Perusahaan;
use App\Models\Renstra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::get('/semua-berita', [App\Http\Controllers\PageController::class, 'berita']);
Route::get('/cari-berita', [App\Http\Controllers\PageController::class, 'berita_search']);
Route::get('/detail-berita/{slug}', [App\Http\Controllers\PageController::class, 'detail_berita']);
Route::get('/data-renstra', [App\Http\Controllers\PageController::class, 'renstra']);
Route::get('/kontak', [App\Http\Controllers\PageController::class, 'kontak']);
Route::get('/kotak-saran', [App\Http\Controllers\PageController::class, 'saran']);
Route::get('/galeri', [App\Http\Controllers\PageController::class, 'galeri']);
Route::get('/sambutan', [App\Http\Controllers\PageController::class, 'sambutan']);
Route::get('/struktur', [App\Http\Controllers\PageController::class, 'struktur']);
Route::get('/bidang', [App\Http\Controllers\PageController::class, 'bidang']);
Route::get('/visi-misi', [App\Http\Controllers\PageController::class, 'visi_misi']);
Route::get('/dashboard-spektra', [App\Http\Controllers\PageController::class, 'dashboard']);
//simpan saran
Route::post('/saran/store',  [SaranController::class, 'store'])->name('saran.store');

//update view
Route::get('/renstra/lihat-file/{id}',  [RenstraController::class, 'lihat_file'])->name('renstra.lihat_file');
Route::get('/berita/lihat-berita/{id}',  [BeritaController::class, 'lihat_berita'])->name('berita.lihat_berita');
Route::post('/pengunjung/store',  [PengunjungController::class, 'store'])->name('pengunjung.store');

Route::get('/download/{file_name}', function ($file_name) {
    $file_path = 'renstra_files/' . $file_name;

    if (Storage::disk('public')->exists($file_path)) {
        // Download file
        $renstra = Renstra::where('file', $file_path)->first();

        $renstra->jmlh_download = $renstra->jmlh_download + 1;
        $renstra->save();

        return Storage::disk('public')->download($file_path);
    }

    // Jika file tidak ditemukan, kirimkan respon 404
    return response()->json(['error' => 'File not found.'], 404);
});

Auth::routes(['register' => false, 'reset' => false]);
Route::middleware(['auth:web'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //penduduk
    Route::get('/penduduk-datatable', [PendudukController::class, 'getPendudukDataTable']);
    //laporan
    Route::get('/laporan/distrik', [LaporanController::class, 'distrik'])->name('laporan.distrik');
    Route::get('/laporan/penduduk', [LaporanController::class, 'penduduk'])->name('laporan.penduduk');
    //akun managemen
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
Route::middleware(['auth:web', 'role:Admin Kabupaten'])->group(function () {
    //penduduk managemen
    Route::post('/penduduk/store',  [PendudukController::class, 'store'])->name('penduduk.store');
    //perusahaan managemen
    Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
    Route::post('/perusahaan/store',  [PerusahaanController::class, 'store'])->name('perusahaan.store');
    Route::get('/perusahaan/edit/{id}',  [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::delete('/perusahaan/delete/{id}',  [PerusahaanController::class, 'destroy'])->name('perusahaan.delete');
    Route::get('/perusahaan-datatable', [PerusahaanController::class, 'getPerusahaanDataTable']);
    //distrik managemen
    Route::get('/distrik-admin/{id_kabupaten}', [DistrikController::class, 'view'])->name('distrik-admin');
    Route::get('/distrik/create', [DistrikController::class, 'create'])->name('distrik.create');
    Route::post('/distrik/store',  [DistrikController::class, 'store'])->name('distrik.store');
    Route::get('/distrik/edit/{id}',  [DistrikController::class, 'edit'])->name('distrik.edit');
    Route::delete('/distrik/delete/{id}',  [DistrikController::class, 'destroy'])->name('distrik.delete');
});

Route::middleware(['auth:web', 'role:Admin Provinsi,Admin Kabupaten,Kadis Provinsi,Kadis Kabupaten'])->group(function () {
    Route::get('/distrik-datatable', [DistrikController::class, 'getDistrikDataTable']);
});
Route::middleware(['auth:web', 'role:Admin Provinsi'])->group(function () {
    //distrik managemen
    Route::get('/distrik', [DistrikController::class, 'index'])->name('distrik');
    //sektor managemen
    Route::get('/sektor', [SektorController::class, 'index'])->name('sektor');
    Route::get('/sektor/create', [SektorController::class, 'create'])->name('sektor.create');
    Route::post('/sektor/store',  [SektorController::class, 'store'])->name('sektor.store');
    Route::get('/sektor/edit/{id}',  [SektorController::class, 'edit'])->name('sektor.edit');
    Route::delete('/sektor/delete/{id}',  [SektorController::class, 'destroy'])->name('sektor.delete');
    Route::get('/sektor-datatable', [SektorController::class, 'getSektorDataTable']);
    //kepemilikan perusahaan managemen
    Route::get('/kepemilikan-perusahaan', [KepemilikanPerusahaanController::class, 'index'])->name('kepemilikan-perusahaan');
    Route::get('/kepemilikan-perusahaan/create', [KepemilikanPerusahaanController::class, 'create'])->name('kepemilikan-perusahaan.create');
    Route::post('/kepemilikan-perusahaan/store',  [KepemilikanPerusahaanController::class, 'store'])->name('kepemilikan-perusahaan.store');
    Route::get('/kepemilikan-perusahaan/edit/{id}',  [KepemilikanPerusahaanController::class, 'edit'])->name('kepemilikan-perusahaan.edit');
    Route::delete('/kepemilikan-perusahaan/delete/{id}',  [KepemilikanPerusahaanController::class, 'destroy'])->name('kepemilikan-perusahaan.delete');
    Route::get('/kepemilikan-perusahaan-datatable', [KepemilikanPerusahaanController::class, 'getKepemilikanPerusahaanDataTable']);
    //skala objek managemen
    Route::get('/skala-objek', [SkalaObjekPengawasanController::class, 'index'])->name('skala-objek');
    Route::get('/skala-objek/create', [SkalaObjekPengawasanController::class, 'create'])->name('skala-objek.create');
    Route::post('/skala-objek/store',  [SkalaObjekPengawasanController::class, 'store'])->name('skala-objek.store');
    Route::get('/skala-objek/edit/{id}',  [SkalaObjekPengawasanController::class, 'edit'])->name('skala-objek.edit');
    Route::delete('/skala-objek/delete/{id}',  [SkalaObjekPengawasanController::class, 'destroy'])->name('skala-objek.delete');
    Route::get('/skala-objek-datatable', [SkalaObjekPengawasanController::class, 'getSkalaObjekDataTable']);
    //status perusahaan managemen
    Route::get('/status-perusahaan', [StatusPerusahaanController::class, 'index'])->name('status-perusahaan');
    Route::get('/status-perusahaan/create', [StatusPerusahaanController::class, 'create'])->name('status-perusahaan.create');
    Route::post('/status-perusahaan/store',  [StatusPerusahaanController::class, 'store'])->name('status-perusahaan.store');
    Route::get('/status-perusahaan/edit/{id}',  [StatusPerusahaanController::class, 'edit'])->name('status-perusahaan.edit');
    Route::delete('/status-perusahaan/delete/{id}',  [StatusPerusahaanController::class, 'destroy'])->name('status-perusahaan.delete');
    Route::get('/status-perusahaan-datatable', [StatusPerusahaanController::class, 'getStatusPerusahaanDataTable']);
    //status modal managemen
    Route::get('/status-modal', [StatusModalController::class, 'index'])->name('status-modal');
    Route::get('/status-modal/create', [StatusModalController::class, 'create'])->name('status-modal.create');
    Route::post('/status-modal/store',  [StatusModalController::class, 'store'])->name('status-modal.store');
    Route::get('/status-modal/edit/{id}',  [StatusModalController::class, 'edit'])->name('status-modal.edit');
    Route::delete('/status-modal/delete/{id}',  [StatusModalController::class, 'destroy'])->name('status-modal.delete');
    Route::get('/status-modal-datatable', [StatusModalController::class, 'getStatusModalDataTable']);
    //kabupaten managemen
    Route::get('/kabupaten', [KabupatenController::class, 'index'])->name('kabupaten');
    Route::get('/kabupaten/create', [KabupatenController::class, 'create'])->name('kabupaten.create');
    Route::post('/kabupaten/store',  [KabupatenController::class, 'store'])->name('kabupaten.store');
    Route::get('/kabupaten/edit/{id}',  [KabupatenController::class, 'edit'])->name('kabupaten.edit');
    Route::delete('/kabupaten/delete/{id}',  [KabupatenController::class, 'destroy'])->name('kabupaten.delete');
    Route::get('/kabupaten-datatable', [KabupatenController::class, 'getKabupatenDataTable']);
});
Route::middleware(['auth:web', 'role:Operator'])->group(function () {
    //setting
    Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting');
    Route::put('/setting/update', [App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');
    //bidang managemen
    Route::get('/data-bidang', [BidangController::class, 'index'])->name('data-bidang');
    Route::post('/bidang/store',  [BidangController::class, 'store'])->name('bidang.store');
    Route::get('/bidang/edit/{id}',  [BidangController::class, 'edit'])->name('bidang.edit');
    Route::delete('/bidang/delete/{id}',  [BidangController::class, 'destroy'])->name('bidang.delete');
    Route::get('/bidang-datatable', [BidangController::class, 'getBidangDataTable']);
    //kategori-berita managemen
    Route::get('/kategori-berita', [KategoriBeritaController::class, 'index'])->name('kategori-berita');
    Route::post('/kategori-berita/store',  [KategoriBeritaController::class, 'store'])->name('kategori-berita.store');
    Route::get('/kategori-berita/edit/{id}',  [KategoriBeritaController::class, 'edit'])->name('kategori-berita.edit');
    Route::delete('/kategori-berita/delete/{id}',  [KategoriBeritaController::class, 'destroy'])->name('kategori-berita.delete');
    Route::get('/kategori-berita-datatable', [KategoriBeritaController::class, 'getKategoriBeritaDataTable']);
    //berita managemen
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store',  [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/edit/{id}',  [BeritaController::class, 'edit'])->name('berita.edit');
    Route::delete('/berita/delete/{id}',  [BeritaController::class, 'destroy'])->name('berita.delete');
    Route::get('/berita-datatable', [BeritaController::class, 'getBeritaDataTable']);
    //galeri managemen
    Route::get('/data-galeri', [GaleriController::class, 'index'])->name('data-galeri');
    Route::post('/galeri/store',  [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/edit/{id}',  [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::delete('/galeri/delete/{id}',  [GaleriController::class, 'destroy'])->name('galeri.delete');
    Route::get('/galeri-datatable', [GaleriController::class, 'getGaleriDataTable']);
    //klien managemen
    Route::get('/klien', [KlienController::class, 'index'])->name('klien');
    Route::post('/klien/store',  [KlienController::class, 'store'])->name('klien.store');
    Route::get('/klien/edit/{id}',  [KlienController::class, 'edit'])->name('klien.edit');
    Route::delete('/klien/delete/{id}',  [KlienController::class, 'destroy'])->name('klien.delete');
    Route::get('/klien-datatable', [KlienController::class, 'getKlienDataTable']);
    //renstra managemen
    Route::get('/renstra', [RenstraController::class, 'index'])->name('renstra');
    Route::post('/renstra/store',  [RenstraController::class, 'store'])->name('renstra.store');
    Route::get('/renstra/edit/{id}',  [RenstraController::class, 'edit'])->name('renstra.edit');
    Route::delete('/renstra/delete/{id}',  [RenstraController::class, 'destroy'])->name('renstra.delete');
    Route::get('/renstra-datatable', [RenstraController::class, 'getRenstraDataTable']);
    //ump managemen
    Route::get('/ump', [UmpController::class, 'index'])->name('ump');
    Route::post('/ump/store',  [UmpController::class, 'store'])->name('ump.store');
    Route::get('/ump/edit/{id}',  [UmpController::class, 'edit'])->name('ump.edit');
    Route::delete('/ump/delete/{id}',  [UmpController::class, 'destroy'])->name('ump.delete');
    Route::get('/ump-datatable', [UmpController::class, 'getUmpDataTable']);
    //saran managemen
    Route::get('/saran', [SaranController::class, 'index'])->name('saran');
    Route::get('/saran/detail/{id}',  [SaranController::class, 'detail'])->name('saran.detail');
    Route::delete('/saran/delete/{id}',  [SaranController::class, 'destroy'])->name('saran.delete');
    Route::get('/saran-datatable', [SaranController::class, 'getSaranDataTable']);
});
Route::middleware(['auth:web', 'role:Super Admin'])->group(function () {
    //data pengunjung
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');
    Route::get('/pengunjung-datatable', [PengunjungController::class, 'getPengunjungDataTable']);
    //user managemen
    Route::get('/users/super-admin', [UserController::class, 'SuperAdmin'])->name('users.super-admin');
    Route::get('/users/admin-provinsi', [UserController::class, 'AdminProvinsi'])->name('users.admin-provinsi');
    Route::get('/users/admin-kabupaten', [UserController::class, 'AdminKabupaten'])->name('users.admin-kabupaten');
    Route::get('/users/operator', [UserController::class, 'Operator'])->name('users.operator');
    Route::get('/users/kadis-provinsi', [UserController::class, 'KadisProvinsi'])->name('users.kadis-provinsi');
    Route::get('/users/kadis-kabupaten', [UserController::class, 'KadisKabupaten'])->name('users.kadis-kabupaten');
    Route::post('/users/store',  [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}',  [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/delete/{id}',  [UserController::class, 'destroy'])->name('users.delete');
    Route::get('/users-datatable/{role}', [UserController::class, 'getUsersDataTable']);
});
