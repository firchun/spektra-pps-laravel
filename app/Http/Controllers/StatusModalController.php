<?php

namespace App\Http\Controllers;

use App\Models\StatusModal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusModalController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Status Modal Perusahaan',
        ];
        return view('admin.status_modal.index', $data);
    }
    public function getStatusModalDataTable()
    {
        $data = StatusModal::orderByDesc('id');

        return DataTables::of($data)
            ->addColumn('action', function ($customer) {
                return view('admin.status_modal.components.actions', compact('customer'));
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
            'status_modal' => 'required|string|max:255',
        ]);

        $statusModalData = [
            'status_modal' => $request->input('status_modal'),
        ];

        if ($request->filled('id')) {
            $StatusModal = StatusModal::find($request->input('id'));
            if (!$StatusModal) {
                return response()->json(['message' => 'kategori not found'], 404);
            }

            $StatusModal->update($statusModalData);
            $message = 'kategori updated successfully';
        } else {
            StatusModal::create($statusModalData);
            $message = 'kategori created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function destroy($id)
    {
        $StatusModals = StatusModal::find($id);

        if (!$StatusModals) {
            return response()->json(['message' => 'StatusModal not found'], 404);
        }

        $StatusModals->delete();

        return response()->json(['message' => 'StatusModal deleted successfully']);
    }
    public function edit($id)
    {
        $StatusModal = StatusModal::find($id);

        if (!$StatusModal) {
            return response()->json(['message' => 'StatusModal not found'], 404);
        }

        return response()->json($StatusModal);
    }
}
