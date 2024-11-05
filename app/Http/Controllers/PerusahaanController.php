<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class PerusahaanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Perusahaan',
        ];
        return view('admin.perusahaan.index', $data);
    }
    public function getPerusahaanDataTable()
    {
        $data = Perusahaan::with(['sektor', 'kabupaten', 'status_perusahaan', 'skala_objek', 'kepemilikan_perusahaan', 'status_modal'])->orderByDesc('id');
        if (Auth::user()->role == 'Admin Kabupaten' || Auth::user()->role = 'Kadis Kabupaten') {
            $data->where('id_kabupaten', Auth::user()->id_kabupaten);
        }
        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.perusahaan.components.actions', compact('customer'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_sektor' => 'required|exists:sektor,id',
            'id_status_perusahaan' => 'required|exists:status_perusahaan,id',
            'id_skala_objek_pengawasan' => 'required|exists:skala_objek_pengawasan,id',
            'id_kepemilikan_perusahaan' => 'required|exists:kepemilikan_perusahaan,id',
            'id_status_modal' => 'required|exists:status_modal,id',
            'kode_wlkp' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'alamat_perusahaan' => 'required|string',
            'telp_perusahaan' => 'required|string|max:15',
            'kbli' => 'nullable|string|max:255',
            'tanggal_pendaftaran' => 'required|date',
            'email_perusahaan' => 'required|email|unique:perusahaan,email_perusahaan,' . $request->input('id'),
            'no_tdp' => 'nullable|string|max:255',
            'no_akta' => 'nullable|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'alamat_pemilik' => 'required|string',
            'nama_pengurus' => 'required|string|max:255',
            'alamat_pengurus' => 'required|string',
            'jumlah_karyawan_laki' => 'nullable|integer|min:0',
            'jumlah_karyawan_perempuan' => 'nullable|integer|min:0',
            'jumlah_tka' => 'nullable|integer|min:0',
            'jumlah_tkl' => 'nullable|integer|min:0',
            'jumlah_oap' => 'nullable|integer|min:0',
            'jumlah_mk_laki' => 'nullable|integer|min:0',
            'jumlah_mk_perempuan' => 'nullable|integer|min:0',
        ]);

        $perusahaanData = [
            'id_sektor' => $request->input('id_sektor'),
            'id_kabupaten' => Auth::user()->id_kabupaten,
            'id_status_perusahaan' => $request->input('id_status_perusahaan'),
            'id_skala_objek_pengawasan' => $request->input('id_skala_objek_pengawasan'),
            'id_kepemilikan_perusahaan' => $request->input('id_kepemilikan_perusahaan'),
            'id_status_modal' => $request->input('id_status_modal'),
            'kode_wlkp' => $request->input('kode_wlkp', '0'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'slug' => Str::slug($request->input('nama_perusahaan')),
            'alamat_perusahaan' => $request->input('alamat_perusahaan'),
            'telp_perusahaan' => $request->input('telp_perusahaan', '+62'),
            'kbli' => $request->input('kbli', '-'),
            'tanggal_pendaftaran' => $request->input('tanggal_pendaftaran'),
            'email_perusahaan' => $request->input('email_perusahaan'),
            'no_tdp' => $request->input('no_tdp', '0'),
            'no_akta' => $request->input('no_akta', '0'),
            'nama_pemilik' => $request->input('nama_pemilik'),
            'alamat_pemilik' => $request->input('alamat_pemilik'),
            'nama_pengurus' => $request->input('nama_pengurus'),
            'alamat_pengurus' => $request->input('alamat_pengurus'),
            'jumlah_karyawan_laki' => $request->input('jumlah_karyawan_laki', 0),
            'jumlah_karyawan_perempuan' => $request->input('jumlah_karyawan_perempuan', 0),
            'jumlah_tka' => $request->input('jumlah_tka', 0),
            'jumlah_tkl' => $request->input('jumlah_tkl', 0),
            'jumlah_oap' => $request->input('jumlah_oap', 0),
            'jumlah_mk_laki' => $request->input('jumlah_mk_laki', 0),
            'jumlah_mk_perempuan' => $request->input('jumlah_mk_perempuan', 0),
        ];

        if ($request->filled('id')) {
            $perusahaan = Perusahaan::find($request->input('id'));
            if (!$perusahaan) {
                return response()->json(['message' => 'perusahaan not found'], 404);
            }

            $perusahaan->update($perusahaanData);
            $message = 'perusahaan updated successfully';
        } else {
            Perusahaan::create($perusahaanData);
            $message = 'perusahaan created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $perusahaan = Perusahaan::find($id);

        if (!$perusahaan) {
            return response()->json(['message' => 'perusahaan not found'], 404);
        }

        $perusahaan->delete();

        return response()->json(['message' => 'Perusahaan deleted successfully']);
    }
    public function edit($id)
    {
        $Perusahaan = Perusahaan::find($id);

        if (!$Perusahaan) {
            return response()->json(['message' => 'Perusahaan not found'], 404);
        }

        return response()->json($Perusahaan);
    }
}
