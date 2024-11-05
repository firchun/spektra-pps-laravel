<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Distrik;
use App\Models\Galeri;
use App\Models\Kabupaten;
use App\Models\PendudukDistrik;
use App\Models\Pengunjung;
use App\Models\Perusahaan;
use App\Models\Renstra;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'berita' => Berita::with(['user', 'kategori'])->where('tampilkan', 1)->latest()->limit(4)->get(),
            'total_distrik' => Distrik::count(),
            'total_kabupaten' => Kabupaten::count(),
            'total_perusahaan' => Perusahaan::count(),
            'total_berita' => Berita::where('tampilkan', 1)->count(),
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
    public function launching()
    {
        $data = [
            'title' => 'Launching',
        ];
        return view('pages.launching', $data);
    }
    public function dashboard()
    {


        // Dummy company data for the chart
        $companyData = Perusahaan::select('nama_perusahaan')
            ->selectRaw('(jumlah_tkl + jumlah_tka + jumlah_oap) as total_karyawan')
            ->get()
            ->reduce(function ($result, $item) {
                $result['labels'][] = $item->nama_perusahaan;
                $result['data'][] = $item->total_karyawan;
                return $result;
            }, ['labels' => [], 'data' => []]);
        $perusahaanData = Perusahaan::selectRaw('
        SUM(jumlah_tkl) as total_tkl,
        SUM(jumlah_tka) as total_tka,
        SUM(jumlah_oap) as total_oap
    ')
            ->first();

        $pieChartData = [
            'labels' => ['Tenaga Kerja Lokal', 'Tenaga Kerja Asing', 'Orang Asli Papua'],
            'data' => [
                $perusahaanData->total_tkl,
                $perusahaanData->total_tka,
                $perusahaanData->total_oap
            ]
        ];
        $data = [
            'title' => 'Dashboard Sepktra',
            'companyData' => $companyData,
            'pieChartData' => $pieChartData,
            'total_distrik' => Distrik::count(),
            'total_kabupaten' => Kabupaten::count(),
            'total_perusahaan' => Perusahaan::count(),
            'total_penduduk' => PendudukDistrik::sum('jumlah'),
            'total_pengangguran' => PendudukDistrik::sum('jumlah_pengangguran'),
            'total_produktif' => PendudukDistrik::sum('jumlah_produktif'),
            'total_tkl' => Perusahaan::sum('jumlah_tkl'),
            'total_tka' => Perusahaan::sum('jumlah_tka'),
            'total_oap' => Perusahaan::sum('jumlah_oap'),

        ];
        return view('pages.dashboard', $data);
    }
    public function getVisitor()
    {
        $today = Pengunjung::whereDate('created_at', now()->toDateString())->count();
        $total = Pengunjung::count();

        return response()->json([
            'today' => $today,
            'total' => $total
        ]);
    }
}
