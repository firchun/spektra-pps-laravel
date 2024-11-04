<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KabupatenController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kabupaten',
        ];
        return view('admin.kabupaten.index', $data);
    }
    public function getKabupatenDataTable()
    {
        $data = Kabupaten::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.kabupaten.components.actions', compact('customer'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kabupaten' => 'required|string|max:255',
            'luas_kawasan' => 'required|string|max:255',
            'batas_selatan' => 'required|string|max:255',
            'batas_utara' => 'required|string|max:255',
            'batas_timur' => 'required|string|max:255',
            'batas_barat' => 'required|string|max:255',
        ]);

        $KabupatenData = [
            'nama_kabupaten' => $request->input('nama_kabupaten'),
            'luas_kawasan' => $request->input('luas_kawasan'),
            'batas_selatan' => $request->input('batas_selatan'),
            'batas_utara' => $request->input('batas_utara'),
            'batas_timur' => $request->input('batas_timur'),
            'batas_barat' => $request->input('batas_barat'),
        ];

        if ($request->filled('id')) {
            $Kabupaten = Kabupaten::find($request->input('id'));
            if (!$Kabupaten) {
                return response()->json(['message' => 'Kabupaten not found'], 404);
            }

            $Kabupaten->update($KabupatenData);
            $message = 'Kabupaten updated successfully';
        } else {
            Kabupaten::create($KabupatenData);
            $message = 'Kabupaten created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $Kabupatens = Kabupaten::find($id);

        if (!$Kabupatens) {
            return response()->json(['message' => 'Kabupaten not found'], 404);
        }

        $Kabupatens->delete();

        return response()->json(['message' => 'Kabupaten deleted successfully']);
    }
    public function edit($id)
    {
        $Kabupaten = Kabupaten::find($id);

        if (!$Kabupaten) {
            return response()->json(['message' => 'Kabupaten not found'], 404);
        }

        return response()->json($Kabupaten);
    }
}
