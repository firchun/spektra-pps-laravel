<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SaranController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kotak Saran',
        ];
        return view('admin.saran.index', $data);
    }
    public function getSaranDataTable()
    {
        $data = Saran::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($saran) {
                return view('admin.saran.components.actions', compact('saran'));
            })
            ->addColumn('saran', function ($saran) {
                return Str::limit($saran->isi_saran, 100);
            })
            ->rawColumns(['action', 'saran'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'isi_saran' => 'required|string',
        ]);
        $saranData = [
            'isi_saran' => $request->input('isi_saran'),
        ];

        if ($request->filled('id')) {
            $Saran = Saran::find($request->input('id'));
            if (!$Saran) {
                return response()->json(['message' => 'Saran not found'], 404);
            }

            $Saran->update($saranData);
            $message = 'Saran updated successfully';
        } else {
            if (Saran::create($saranData)) {

                session()->flash('success', 'terimakasih telah memberikan saran pada instansi kami..');
            } else {

                session()->flash('error', 'Terjadi kesalahan saat mengirimkan saran.');
            }
            return back();
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $saran = Saran::find($id);

        if (!$saran) {
            return response()->json(['message' => 'Saran not found'], 404);
        }

        $saran->delete();

        return response()->json(['message' => 'Saran deleted successfully']);
    }
    public function detail($id)
    {
        $saran = Saran::find($id);

        if (!$saran) {
            return response()->json(['message' => 'Saran not found'], 404);
        }

        return response()->json($saran);
    }
}
