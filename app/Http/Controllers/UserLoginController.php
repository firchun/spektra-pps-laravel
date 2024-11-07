<?php

namespace App\Http\Controllers;

use App\Models\UserLogin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserLoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Login Pengguna',
        ];
        return view('admin.data_login.index', $data);
    }
    public function getUserLoginDataTable(Request $request)
    {
        if ($request->has('export') && $request->export === 'all') {

            $data = UserLogin::with(['user'])->get();
            return response()->json(['data' => $data]);
        }
        $data = UserLogin::with(['user'])->orderByDesc('id');

        return DataTables::of($data)

            ->addColumn('tanggal', function ($customer) {
                return $customer->created_at->format('d F Y');
            })
            ->rawColumns(['tanggal'])
            ->make(true);
    }
}
