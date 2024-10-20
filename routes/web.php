<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RenstraController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\UmpController;
use App\Http\Controllers\UserController;
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
    //setting
    Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting');
    Route::put('/setting/update', [App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');

    //akun managemen
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //data pengunjung
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');
    Route::get('/pengunjung-datatable', [PengunjungController::class, 'getPengunjungDataTable']);
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
Route::middleware(['auth:web', 'role:Admin'])->group(function () {
    //user managemen
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/store',  [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}',  [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/delete/{id}',  [UserController::class, 'destroy'])->name('users.delete');
    Route::get('/users-datatable', [UserController::class, 'getUsersDataTable']);
});
