<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Berita',
        ];
        return view('admin.berita.main.index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Buat Berita',
        ];
        return view('admin.berita.main.create', $data);
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Berita',
            'data' => Berita::find($id)
        ];
        return view('admin.berita.main.edit', $data);
    }
    public function getBeritaDataTable()
    {
        $data = Berita::with(['user'])->orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.berita.main.components.actions', compact('customer'));
            })
            ->addColumn('foto', function ($customer) {
                $imagePath = $customer->foto ? Storage::url($customer->foto) : asset('img/default.webp');
                return '<img src="' . $imagePath . '" alt="' . $customer->slug . '" style="width:100px;">';
            })
            ->rawColumns(['action', 'foto'])
            ->make(true);
    }
    public function lihat_berita($id)
    {
        $berita = Berita::find($id);
        $berita->pengunjung = $berita->pengunjung + 1;
        $berita->save();
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_berita' => 'required',
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required',
            'foto' => $request->has('id') ? 'sometimes|file|mimes:jpeg,png,jpg,gif,svg|max:10048' : 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        // Proses upload gambar jika ada
        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('foto', 'public');
        }

        $beritaData = [
            'id_kategori_berita' => $request->input('id_kategori_berita'),
            'judul' => $request->input('judul'),
            'tampilkan' => $request->input('tampilkan'),
            'isi_berita' => $request->input('isi_berita'),
            'id_user' => Auth::id(),
            'slug' => Str::slug($request->input('judul')),

        ];


        if ($request->filled('id')) {
            $Berita = Berita::find($request->input('id'));
            if (!$Berita) {
                return response()->json(['message' => 'kategori not found'], 404);
            }
            $beritaData['foto'] = $filePath ?? $Berita->foto;
            $Berita->update($beritaData);
            session()->flash('success', 'Berhasil menyimpan berita');
            return redirect()->to('/berita');
        } else {
            $beritaData['foto'] = $filePath;
            Berita::create($beritaData);
            session()->flash('success', 'Berhasil menyimpan berita');
            return redirect()->to('/berita');
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $Beritas = Berita::find($id);

        if (!$Beritas) {
            return response()->json(['message' => 'KategoriBerita not found'], 404);
        }

        $Beritas->delete();

        return response()->json(['message' => 'KategoriBerita deleted successfully']);
    }
}
