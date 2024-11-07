<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pengunjung;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Dummy company data for the chart
        $companyData = Perusahaan::select('nama_perusahaan')
            ->selectRaw('(jumlah_tkl + jumlah_tka + jumlah_oap) as total_karyawan');

        if (Auth::user()->id_kabupaten) {
            $companyData->where('id_kabupaten', Auth::user()->id_kabupaten);
        }

        $companyData = $companyData->get()
            ->reduce(function ($result, $item) {
                $result['labels'][] = $item->nama_perusahaan;
                $result['data'][] = $item->total_karyawan;
                return $result;
            }, ['labels' => [], 'data' => []]);

        $perusahaan = Perusahaan::selectRaw('
            SUM(jumlah_tkl) as total_tkl,
            SUM(jumlah_tka) as total_tka,
            SUM(jumlah_oap) as total_oap
        ');

        if (Auth::user()->id_kabupaten) {
            $perusahaan->where('id_kabupaten', Auth::user()->id_kabupaten);
        }

        $perusahaanData = $perusahaan->first();

        $pieChartData = [
            'labels' => ['Tenaga Kerja Lokal', 'Tenaga Kerja Asing', 'Orang Asli Papua'],
            'data' => [
                $perusahaanData->total_tkl,
                $perusahaanData->total_tka,
                $perusahaanData->total_oap
            ]
        ];
        $data = [
            'companyData' => $companyData,
            'pieChartData' => $pieChartData,
            'title' => 'Dashboard ' . Auth::user()->role,
        ];
        return view('admin.dashboard', $data);
    }
    public function dashboardAdmin()
    {
        $data = [
            'title' => 'Dashboard',
            'users' => User::count(),
            'customers' => Customer::count()
        ];
        return view('admin.dashboard', $data);
    }
    public function dashboardSuperAdmin()
    {
        $data = [
            'title' => 'Dashboard',
            'users' => User::count(),
            'customers' => Customer::count()
        ];
        return view('admin.dashboard', $data);
    }
    public function dashboardSpektra()
    {
        $data = [
            'title' => 'Dashboard',
            'users' => User::count(),
            'customers' => Customer::count()
        ];
        return view('admin.dashboard', $data);
    }
    public function getVisitorPerDay()
    {
        // Mengambil data pengunjung dalam 7 hari terakhir, dikelompokkan per hari
        $visitorData = Pengunjung::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Format data untuk output JSON ke Chart.js
        $formattedData = [
            'labels' => $visitorData->pluck('date')->map(function ($date) {
                return \Carbon\Carbon::parse($date)->format('Y-m-d');
            }),
            'data' => $visitorData->pluck('count')
        ];

        return response()->json($formattedData);
    }
}
