<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GaleriController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Galeri',
        ];
        return view('admin.galeri.index', $data);
    }
    public function getGaleriDataTable()
    {
        $data = Galeri::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($galeri) {
                return view('admin.galeri.components.actions', compact('galeri'));
            })
            ->addColumn('file', function ($customer) {
                return  '<img src="' . Storage::url($customer->file) . '" alt="' . $customer->nama . '" style="width:100px;">';
            })
            ->rawColumns(['action', 'file'])
            ->make(true);
    }
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'judul' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'file' => $request->has('id') ? 'sometimes|file|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('galeri', 'public');
        }

        $GaleriData = [
            'judul' => $request->input('judul'),
            'untuk' => $request->input('untuk'),
            'jenis' => $request->input('jenis'),
            'keterangan' => $request->input('keterangan'),
            'tampilkan' => $request->input('tampilkan'),
        ];

        if ($request->filled('id')) {
            $Galeri = Galeri::find($request->input('id'));
            if (!$Galeri) {
                return response()->json(['message' => 'Galeri not found'], 404);
            }
            $GaleriData['file'] = $filePath ?? $Galeri->file;
            $Galeri->update($GaleriData);
            $message = 'Galeri updated successfully';
        } else {
            $GaleriData['file'] = $filePath;
            Galeri::create($GaleriData);
            $message = 'Galeri created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $Galeris = Galeri::find($id);

        if (!$Galeris) {
            return response()->json(['message' => 'Galeri not found'], 404);
        }

        $Galeris->delete();

        return response()->json(['message' => 'Galeri deleted successfully']);
    }
    public function edit($id)
    {
        $Galeri = Galeri::find($id);

        if (!$Galeri) {
            return response()->json(['message' => 'Galeri not found'], 404);
        }

        return response()->json($Galeri);
    }
}
