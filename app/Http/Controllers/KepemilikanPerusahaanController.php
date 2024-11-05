<?php

namespace App\Http\Controllers;

use App\Models\KepemilikanPerusahaan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KepemilikanPerusahaanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kepemilikan Perusahaan',
        ];
        return view('admin.kepemilikan_perusahaan.index', $data);
    }
    public function getKepemilikanPerusahaanDataTable()
    {
        $data = KepemilikanPerusahaan::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.kepemilikan_perusahaan.components.actions', compact('customer'));
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
            'kepemilikan' => 'required|string|max:255',
        ]);

        $KepemilikanPerusahaanData = [
            'kepemilikan' => $request->input('kepemilikan'),
        ];

        if ($request->filled('id')) {
            $KepemilikanPerusahaan = KepemilikanPerusahaan::find($request->input('id'));
            if (!$KepemilikanPerusahaan) {
                return response()->json(['message' => 'data not found'], 404);
            }

            $KepemilikanPerusahaan->update($KepemilikanPerusahaanData);
            $message = 'kategori updated successfully';
        } else {
            KepemilikanPerusahaan::create($KepemilikanPerusahaanData);
            $message = 'kategori created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $KepemilikanPerusahaans = KepemilikanPerusahaan::find($id);

        if (!$KepemilikanPerusahaans) {
            return response()->json(['message' => 'KepemilikanPerusahaan not found'], 404);
        }

        $KepemilikanPerusahaans->delete();

        return response()->json(['message' => 'KepemilikanPerusahaan deleted successfully']);
    }
    public function edit($id)
    {
        $KepemilikanPerusahaan = KepemilikanPerusahaan::find($id);

        if (!$KepemilikanPerusahaan) {
            return response()->json(['message' => 'KepemilikanPerusahaan not found'], 404);
        }

        return response()->json($KepemilikanPerusahaan);
    }
}
