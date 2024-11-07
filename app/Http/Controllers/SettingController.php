<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengaturan Website',
            'setting' => Setting::latest()->first()
        ];
        return view('admin.setting.index', $data);
    }
    public function update(Request $request)
    {
        // Ambil record dengan ID terakhir (tertinggi)
        $setting = Setting::orderBy('id', 'desc')->first();

        if ($setting) {
            $dataUpdate = [
                'nama_kadis'     => $request->input('nama_kadis', $setting->nama_kadis),
                'sambutan_kadis' => $request->input('sambutan_kadis', $setting->sambutan_kadis),
                'visi'           => $request->input('visi', $setting->visi),
                'alamat_dinas'   => $request->input('alamat_dinas', $setting->alamat_dinas),
                'misi'           => $request->input('misi', $setting->misi),
                'email_dinas'    => $request->input('email_dinas', $setting->email_dinas),
                'google_maps'    => $request->input('google_maps', $setting->google_maps),
                'telp'           => $request->input('telp', $setting->telp),
                'fax'            => $request->input('fax', $setting->fax),
            ];

            if ($request->hasFile('foto_dinas')) {
                $filePathFotoDinas = $request->file('foto_dinas')->store('public/galeri');
                $dataUpdate['foto_dinas'] = $filePathFotoDinas;
            } else {
                $dataUpdate['foto_dinas'] = $setting->foto_dinas;
            }

            if ($request->hasFile('struktur_dinas')) {
                $filePathStrukturDinas = $request->file('struktur_dinas')->store('public/galeri');

                $dataUpdate['struktur_dinas'] = $filePathStrukturDinas;
            } else {
                $dataUpdate['struktur_dinas'] = $setting->struktur_dinas;
            }

            Setting::where('id', $setting->id)
                ->update($dataUpdate);

            return back()->with('success', 'Berhasil memperbarui setting');
        }

        return back()->with('danger', 'Gagal memperbarui setting');
    }
}
