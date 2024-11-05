<?php

namespace App\Http\Controllers;

use App\Models\StatusPerusahaan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusPerusahaanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Status Perusahaan',
        ];
        return view('admin.status_perusahaan.index', $data);
    }
    public function getStatusPerusahaanDataTable()
    {
        $data = StatusPerusahaan::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.status_perusahaan.components.actions', compact('customer'));
            })
            ->addColumn('jmlh_perusahaan', function ($data) {
                return 0;
            })
            ->rawColumns(['action', 'jmlh_perusahaan'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $StatusPerusahaanData = [
            'status' => $request->input('status'),
        ];

        if ($request->filled('id')) {
            $StatusPerusahaan = StatusPerusahaan::find($request->input('id'));
            if (!$StatusPerusahaan) {
                return response()->json(['message' => 'kategori not found'], 404);
            }

            $StatusPerusahaan->update($StatusPerusahaanData);
            $message = 'kategori updated successfully';
        } else {
            StatusPerusahaan::create($StatusPerusahaanData);
            $message = 'kategori created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $StatusPerusahaans = StatusPerusahaan::find($id);

        if (!$StatusPerusahaans) {
            return response()->json(['message' => 'StatusPerusahaan not found'], 404);
        }

        $StatusPerusahaans->delete();

        return response()->json(['message' => 'StatusPerusahaan deleted successfully']);
    }
    public function edit($id)
    {
        $StatusPerusahaan = StatusPerusahaan::find($id);

        if (!$StatusPerusahaan) {
            return response()->json(['message' => 'StatusPerusahaan not found'], 404);
        }

        return response()->json($StatusPerusahaan);
    }
}