<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BidangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Bidang',
        ];
        return view('admin.bidang.index', $data);
    }
    public function getBidangDataTable()
    {
        $data = Bidang::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.bidang.components.actions', compact('customer'));
            })
            ->addColumn('logo', function ($customer) {
                return '';
            })

            ->rawColumns(['action', 'logo'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
            'nama_kepala_bidang' => 'required|string|max:255',
            'logo_bidang' => 'string',
            'keterangan_bidang' => 'required|string',
            'jmlh_pegawai' => 'required|integer',
        ]);

        $bidangData = [
            'nama_bidang' => $request->input('nama_bidang'),
            'nama_kepala_bidang' => $request->input('nama_kepala_bidang'),
            'keterangan_bidang' => $request->input('keterangan_bidang'),
            'jmlh_pegawai' => $request->input('jmlh_pegawai'),
        ];

        if ($request->filled('id')) {
            $Bidang = Bidang::find($request->input('id'));
            if (!$Bidang) {
                return response()->json(['message' => 'Bidang not found'], 404);
            }

            $Bidang->update($bidangData);
            $message = 'Bidang updated successfully';
        } else {
            Bidang::create($bidangData);
            $message = 'Bidang created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $Bidangs = Bidang::find($id);

        if (!$Bidangs) {
            return response()->json(['message' => 'Bidang not found'], 404);
        }

        $Bidangs->delete();

        return response()->json(['message' => 'Bidang deleted successfully']);
    }
    public function edit($id)
    {
        $Bidang = Bidang::find($id);

        if (!$Bidang) {
            return response()->json(['message' => 'Bidang not found'], 404);
        }

        return response()->json($Bidang);
    }
}
