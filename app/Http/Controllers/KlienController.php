<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class KlienController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Klien',
        ];
        return view('admin.klien.index', $data);
    }
    public function getKlienDataTable()
    {
        $data = Klien::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.klien.components.actions', compact('customer'));
            })
            ->addColumn('logo', function ($customer) {
                return  '<img src="' . Storage::url($customer->logo) . '" alt="' . $customer->nama . '" style="width:100px;">';
            })
            ->rawColumns(['action', 'logo'])
            ->make(true);
    }
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => $request->has('id') ? 'sometimes|file|mimes:jpeg,png,jpg,gif,svg|max:5048' : 'required|file|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $KlienData = [
            'nama' => $request->input('nama'),
        ];

        if ($request->filled('id')) {
            $Klien = Klien::find($request->input('id'));
            if (!$Klien) {
                return response()->json(['message' => 'Klien not found'], 404);
            }
            $KlienData['logo'] = $logoPath ?? $Klien->logo;
            $Klien->update($KlienData);
            $message = 'Klien updated successfully';
        } else {
            $KlienData['logo'] = $logoPath;
            Klien::create($KlienData);
            $message = 'Klien created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $Kliens = Klien::find($id);

        if (!$Kliens) {
            return response()->json(['message' => 'Klien not found'], 404);
        }

        $Kliens->delete();

        return response()->json(['message' => 'Klien deleted successfully']);
    }
    public function edit($id)
    {
        $Klien = Klien::find($id);

        if (!$Klien) {
            return response()->json(['message' => 'Klien not found'], 404);
        }

        return response()->json($Klien);
    }
}
