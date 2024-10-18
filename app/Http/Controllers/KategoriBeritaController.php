<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kategori Berita',
        ];
        return view('admin.berita.kategori.index', $data);
    }
    public function getKategoriBeritaDataTable()
    {
        $data = KategoriBerita::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.berita.kategori.components.actions', compact('customer'));
            })
            ->addColumn('jmlh_berita', function ($data) {
                return Berita::where('id_kategori_berita', $data->id)->count();
            })

            ->rawColumns(['action', 'jmlh_berita'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $KategoriBeritaData = [
            'kategori' => $request->input('kategori'),
            'slug' => Str::slug($request->input('kategori')),
        ];

        if ($request->filled('id')) {
            $KategoriBerita = KategoriBerita::find($request->input('id'));
            if (!$KategoriBerita) {
                return response()->json(['message' => 'kategori not found'], 404);
            }

            $KategoriBerita->update($KategoriBeritaData);
            $message = 'kategori updated successfully';
        } else {
            KategoriBerita::create($KategoriBeritaData);
            $message = 'kategori created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $KategoriBeritas = KategoriBerita::find($id);

        if (!$KategoriBeritas) {
            return response()->json(['message' => 'KategoriBerita not found'], 404);
        }

        $KategoriBeritas->delete();

        return response()->json(['message' => 'KategoriBerita deleted successfully']);
    }
    public function edit($id)
    {
        $KategoriBerita = KategoriBerita::find($id);

        if (!$KategoriBerita) {
            return response()->json(['message' => 'KategoriBerita not found'], 404);
        }

        return response()->json($KategoriBerita);
    }
}
