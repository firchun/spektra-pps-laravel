<?php

namespace App\Http\Controllers;

use App\Models\Pengunjuang;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengunjungController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pengunjung',
        ];
        return view('admin.pengunjung.index', $data);
    }
    public function getPengunjungDataTable()
    {
        $data = Pengunjung::orderByDesc('id');

        return DataTables::of($data)

            ->addColumn('tanggal', function ($customer) {
                return $customer->created_at->format('d F Y');
            })
            ->rawColumns(['tanggal'])
            ->make(true);
    }
    public function store(Request $request)
    {
        // Get visitor details
        $ip = $request->ip(); // Get the IP address
        $browser = $request->header('User-Agent'); // Get the browser info
        $data = $request->input('data'); // Other data from AJAX request

        // Prepare the data to store
        $bidangData = [
            'data' => json_encode([
                'ip' => $ip,
                'browser' => $browser,
                'additional_data' => $data, // Example of additional data
            ]),
        ];

        // Store the data in the database
        Pengunjung::create($bidangData);

        // Return a success message
        return response()->json(['message' => 'Visitor data stored successfully']);
    }
}
