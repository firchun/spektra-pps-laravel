<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function distrik()
    {
        $data = [
            'title' => 'Laporan Data Distrik'
        ];
        return view('admin.laporan.distrik', $data);
    }
    public function penduduk()
    {
        $data = [
            'title' => 'Laporan Data Penduduk'
        ];
        return view('admin.laporan.penduduk', $data);
    }
}
