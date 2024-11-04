<?php

namespace App\Http\Controllers;

use App\Models\PendudukDistrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PendudukController extends Controller
{
    public function getPendudukDataTable()
    {
        $data = PendudukDistrik::with(['kabupaten', 'distrik'])->orderByDesc('id');
        $user = Auth::user();
        if ($user->role == 'Admin Kabupaten' || $user->role == 'Kadis Kabupaten') {
            $data->where('id_kabupaten', Auth::user()->id_kabupaten);
        }
        return DataTables::of($data)
            ->rawColumns([])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_distrik' => 'required',
            'tahun' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'jumlah_produktif' => 'required|string|max:255',
            'jumlah_pengangguran' => 'required|string|max:255',
        ]);

        $pendudukData = [
            'id_distrik' => $request->input('id_distrik'),
            'tahun' => $request->input('tahun'),
            'jumlah' => $request->input('jumlah'),
            'jumlah_produktif' => $request->input('jumlah_produktif'),
            'jumlah_pengangguran' => $request->input('jumlah_pengangguran'),
            'id_kabupaten' => Auth::user()->id_kabupaten
        ];

        if ($request->filled('id')) {
            $PendudukDistrik = PendudukDistrik::find($request->input('id'));
            if (!$PendudukDistrik) {
                return response()->json(['message' => 'Penduduk not found'], 404);
            }

            $PendudukDistrik->update($pendudukData);
            $message = 'penduduk updated successfully';
        } else {
            PendudukDistrik::create($pendudukData);
            $message = 'penduduk created successfully';
        }

        return response()->json(['message' => $message]);
    }
}
