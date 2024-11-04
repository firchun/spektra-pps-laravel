<?php

namespace App\Http\Controllers;

use App\Models\Distrik;
use App\Models\Kabupaten;
use App\Models\PendudukDistrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DistrikController extends Controller
{
    public function index()
    {
        $id_kabupaten = Auth::user()->id_kabupaten;
        $kabupaten = Kabupaten::find($id_kabupaten);
        $data = [
            'title' => 'Data Distrik pada : ' . $kabupaten->nama_kabupaten,
        ];
        return view('admin.distrik.index', $data);
    }
    public function view($id_kabupaten)
    {
        $kabupaten = Kabupaten::find($id_kabupaten);
        $data = [
            'title' => 'Data Distrik Kabupaten ' . $kabupaten->nama_kabupaten,
        ];
        return view('admin.distrik.index', $data);
    }
    public function getDistrikDataTable()
    {
        $data = Distrik::orderByDesc('id');
        $user = Auth::user();
        if ($user->role == 'Admin Kabupaten') {
            $data->where('id_kabupaten', Auth::user()->id_kabupaten);
        }
        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.distrik.components.actions', compact('customer'));
            })
            ->addColumn('jumlah_penduduk', function ($distrik) {
                return PendudukDistrik::where('id_distrik', $distrik->id)->latest()->first()->jumlah ?? 0;
            })
            ->addColumn('jumlah_produktif', function ($distrik) {
                return PendudukDistrik::where('id_distrik', $distrik->id)->latest()->first()->jumlah_produktif ?? 0;
            })
            ->addColumn('jumlah_pengangguran', function ($distrik) {
                return PendudukDistrik::where('id_distrik', $distrik->id)->latest()->first()->jumlah_produktif ?? 0;
            })
            ->rawColumns(['action', 'jumlah_penduduk', 'jumlah_produktif', 'jumlah_pengangguran'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_distrik' => 'required|string|max:255',
            'luas_kawasan' => 'required',
            'batas_selatan' => 'nullable|string|max:255',
            'batas_utara' => 'nullable|string|max:255',
            'batas_timur' => 'nullable|string|max:255',
            'batas_barat' => 'nullable|string|max:255',
        ]);

        $DistrikData = [
            'nama_distrik' => $request->input('nama_distrik'),
            'luas_kawasan' => $request->input('luas_kawasan'),
            'batas_selatan' => $request->input('batas_selatan') ?? '-',
            'batas_utara' => $request->input('batas_utara') ?? '-',
            'batas_timur' => $request->input('batas_timur') ?? '-',
            'batas_barat' => $request->input('batas_barat') ?? '-',
            'id_kabupaten' => Auth::user()->id_kabupaten
        ];

        if ($request->filled('id')) {
            $Distrik = Distrik::find($request->input('id'));
            if (!$Distrik) {
                return response()->json(['message' => 'Distrik not found'], 404);
            }

            $Distrik->update($DistrikData);
            $message = 'Distrik updated successfully';
        } else {
            Distrik::create($DistrikData);
            $message = 'Distrik created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $Distriks = Distrik::find($id);

        if (!$Distriks) {
            return response()->json(['message' => 'Distrik not found'], 404);
        }

        $Distriks->delete();

        return response()->json(['message' => 'Distrik deleted successfully']);
    }
    public function edit($id)
    {
        $Distrik = Distrik::find($id);

        if (!$Distrik) {
            return response()->json(['message' => 'Distrik not found'], 404);
        }

        return response()->json($Distrik);
    }
}
