<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SektorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sektor Perusahaan',
        ];
        return view('admin.sektor.index', $data);
    }
    public function getSektorDataTable()
    {
        $data = Sektor::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.sektor.components.actions', compact('customer'));
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
            'sektor' => 'required|string|max:255',
        ]);

        $SektorData = [
            'sektor' => $request->input('sektor'),
        ];

        if ($request->filled('id')) {
            $Sektor = Sektor::find($request->input('id'));
            if (!$Sektor) {
                return response()->json(['message' => 'sektor not found'], 404);
            }

            $Sektor->update($SektorData);
            $message = 'sektor updated successfully';
        } else {
            Sektor::create($SektorData);
            $message = 'sektor created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $Sektors = Sektor::find($id);

        if (!$Sektors) {
            return response()->json(['message' => 'Sektor not found'], 404);
        }

        $Sektors->delete();

        return response()->json(['message' => 'Sektor deleted successfully']);
    }
    public function edit($id)
    {
        $Sektor = Sektor::find($id);

        if (!$Sektor) {
            return response()->json(['message' => 'Sektor not found'], 404);
        }

        return response()->json($Sektor);
    }
}