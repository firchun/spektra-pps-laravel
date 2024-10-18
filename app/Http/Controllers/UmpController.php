<?php

namespace App\Http\Controllers;

use App\Models\Ump;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UmpController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Upah Minimum Provinsi',
        ];
        return view('admin.ump.index', $data);
    }
    public function getUmpDataTable()
    {
        $data = Ump::orderBy('id', 'asc');

        return DataTables::of($data)
            ->addColumn('action', function ($ump) {
                return view('admin.ump.components.actions', compact('ump'));
            })
            ->addColumn('upah', function ($ump) {
                return 'Rp ' . number_format($ump->upah);
            })
            ->addColumn('perbandingan', function ($ump) {
                // Ambil data upah sekarang dan upah sebelumnya
                $upah_sekarang = $ump->upah;
                $upah_sebelumnya = Ump::where('id', '<', $ump->id)
                    ->orderBy('id', 'desc')
                    ->value('upah');

                // Cek apakah upah sebelumnya tidak kosong atau nol untuk menghindari pembagian nol
                if ($upah_sebelumnya > 0) {
                    // Hitung selisih dan persentase perubahan
                    $selisih = $upah_sekarang - $upah_sebelumnya;
                    $persentase_perubahan = ($selisih / $upah_sebelumnya) * 100;

                    // Tentukan apakah itu kenaikan atau penurunan
                    if ($persentase_perubahan > 0) {
                        return 'Kenaikan: ' . number_format($persentase_perubahan, 2) . '%';
                    } elseif ($persentase_perubahan < 0) {
                        return 'Penurunan: ' . number_format(abs($persentase_perubahan), 2) . '%';
                    } else {
                        return 'Tidak ada perubahan';
                    }
                } else {
                    // Jika upah sebelumnya tidak valid, tampilkan pesan
                    return 0;
                }
            })

            ->rawColumns(['action', 'perbandingan', 'upah'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'upah' => 'required|integer',
        ]);
        $umpData = [
            'upah' => $request->input('upah'),
        ];

        if ($request->filled('id')) {
            $Ump = Ump::find($request->input('id'));
            if (!$Ump) {
                return response()->json(['message' => 'Ump not found'], 404);
            }

            $Ump->update($umpData);
            $message = 'Ump updated successfully';
        } else {
            if (Ump::create($umpData)) {

                session()->flash('success', 'terimakasih telah memberikan Ump pada instansi kami..');
            } else {

                session()->flash('error', 'Terjadi kesalahan saat mengirimkan Ump.');
            }
            return back();
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $Ump = Ump::find($id);

        if (!$Ump) {
            return response()->json(['message' => 'Ump not found'], 404);
        }

        $Ump->delete();

        return response()->json(['message' => 'Ump deleted successfully']);
    }
    public function edit($id)
    {
        $Ump = Ump::find($id);

        if (!$Ump) {
            return response()->json(['message' => 'Ump not found'], 404);
        }

        return response()->json($Ump);
    }
}
