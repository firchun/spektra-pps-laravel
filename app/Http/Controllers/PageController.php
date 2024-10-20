<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Renstra;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'berita' => Berita::with(['user', 'kategori'])->where('tampilkan', 1)->latest()->limit(4)->get()
        ];
        return view('pages.index', $data);
    }
    public function galeri()
    {
        $data = [
            'title' => 'Galeri',
            'galeri' => Galeri::where('tampilkan', 1)->get()
        ];
        return view('pages.galeri', $data);
    }
    public function saran()
    {
        $data = [
            'title' => 'Kotak Saran',
        ];
        return view('pages.saran', $data);
    }
    public function kontak()
    {
        $data = [
            'title' => 'Kontak',
        ];
        return view('pages.kontak', $data);
    }
    public function renstra()
    {
        $data = [
            'title' => 'Renstra',
            'renstra' => Renstra::paginate(10),
        ];
        return view('pages.renstra', $data);
    }
    public function berita_search(Request $request)
    {
        // Ambil nilai dari input pencarian
        $search = $request->input('search');

        // Query dasar untuk mengambil berita yang ditampilkan
        $query = Berita::with(['user', 'kategori'])->where('tampilkan', 1);

        // Jika ada pencarian, tambahkan filter untuk mencari judul atau konten berita
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('isi_berita', 'like', '%' . $search . '%');
            });
        }

        $data = [
            'title' => 'Cari : ' . $search,
            'berita' => $query->latest()->paginate(10)
        ];

        // Kirim data ke view
        return view('pages.berita', $data);
    }
    public function berita()
    {
        $data = [
            'berita' => Berita::with(['user', 'kategori'])->where('tampilkan', 1)->latest()->paginate(10)
        ];
        return view('pages.berita', $data);
    }
    public function detail_berita($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        if ($berita == null) {
            abort(404);
        }
        $data = [
            'title' => $berita->judul,
            'berita' => $berita,
            'berita_lainnya' => Berita::with(['user', 'kategori'])->where('slug', '!=', $slug)->where('tampilkan', 1)->latest()->limit(4)->get()
        ];
        return view('pages.detail_berita', $data);
    }
    public function sambutan()
    {
        $data = [
            'title' => 'Sambutan Kepala Dinas',
        ];
        return view('pages.sambutan', $data);
    }
    public function visi_misi()
    {
        $data = [
            'title' => 'Visi dan Misi Dinas',
        ];
        return view('pages.visi_misi', $data);
    }
    public function struktur()
    {
        $data = [
            'title' => 'Struktur Dinas',
        ];
        return view('pages.struktur', $data);
    }
    public function bidang()
    {
        $data = [
            'title' => 'Bidang beserta tugas',
        ];
        return view('pages.bidang', $data);
    }
    public function dashboard()
    {
        $totalKabupaten = 4;
        $totalSdm = 200;

        // Dummy company data for the chart
        $companyData = [
            'labels' => ['Company A', 'Company B', 'Company C', 'Company D', 'Company E'],
            'data' => [150, 200, 120, 180, 90] // Example numbers for each company
        ];
        $data = [
            'title' => 'Dashboard Sepktra',
            'totalKabupaten' => $totalKabupaten,
            'totalSdm' => $totalSdm,
            'companyData' => $companyData

        ];
        return view('pages.dashboard', $data);
    }
}
