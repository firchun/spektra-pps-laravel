<?php

namespace App\Http\Controllers;

use App\Models\Renstra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class RenstraController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'File Renstra',
        ];
        return view('admin.renstra.index', $data);
    }
    public function getRenstraDataTable()
    {
        $data = Renstra::orderBy('id', 'asc');

        return DataTables::of($data)
            ->addColumn('action', function ($renstra) {
                return view('admin.renstra.components.actions', compact('renstra'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function lihat_file($id)
    {
        $renstra = Renstra::find($id);
        $renstra->jmlh_view = $renstra->jmlh_view + 1;
        $renstra->save();
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required_if:id,null|file|mimes:pdf',
        ]);

        $renstraData = [
            'judul' => $request->input('judul'),
            'slug' => Str::slug($request->input('judul')),
        ];

        // Store the PDF file in the storage disk
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('renstra_files', $fileName, 'public'); // Store in the 'storage' disk
            $renstraData['file'] = $filePath;
        }

        if ($request->filled('id')) {
            $renstra = Renstra::find($request->input('id'));
            if (!$renstra) {
                return response()->json(['message' => 'renstra not found'], 404);
            }

            $renstra->update($renstraData);
            $message = 'renstra updated successfully';
        } else {
            $renstra = Renstra::create($renstraData);
            $message = 'renstra created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $renstra = Renstra::find($id);

        if (!$renstra) {
            return response()->json(['message' => 'renstra not found'], 404);
        }

        $renstra->delete();

        return response()->json(['message' => 'renstra deleted successfully']);
    }
    public function edit($id)
    {
        $renstra = Renstra::find($id);

        if (!$renstra) {
            return response()->json(['message' => 'renstra not found'], 404);
        }

        return response()->json($renstra);
    }
}
