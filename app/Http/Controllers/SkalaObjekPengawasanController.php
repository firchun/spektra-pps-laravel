<?php

namespace App\Http\Controllers;

use App\Models\SkalaObjekPengawasan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SkalaObjekPengawasanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Skala Objek Pengawasan Perusahaan',
        ];
        return view('admin.skala_objek.index', $data);
    }
    public function getSkalaObjekDataTable()
    {
        $data = SkalaObjekPengawasan::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.skala_objek.components.actions', compact('customer'));
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
            'skala_objek' => 'required|string|max:255',
        ]);

        $SkalaObjekData = [
            'skala_objek' => $request->input('skala_objek'),
        ];

        if ($request->filled('id')) {
            $SkalaObjek = SkalaObjekPengawasan::find($request->input('id'));
            if (!$SkalaObjek) {
                return response()->json(['message' => 'kategori not found'], 404);
            }

            $SkalaObjek->update($SkalaObjekData);
            $message = 'kategori updated successfully';
        } else {
            SkalaObjekPengawasan::create($SkalaObjekData);
            $message = 'kategori created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $SkalaObjeks = SkalaObjekPengawasan::find($id);

        if (!$SkalaObjeks) {
            return response()->json(['message' => 'SkalaObjek not found'], 404);
        }

        $SkalaObjeks->delete();

        return response()->json(['message' => 'SkalaObjek deleted successfully']);
    }
    public function edit($id)
    {
        $SkalaObjek = SkalaObjekPengawasan::find($id);

        if (!$SkalaObjek) {
            return response()->json(['message' => 'SkalaObjek not found'], 404);
        }

        return response()->json($SkalaObjek);
    }
}
