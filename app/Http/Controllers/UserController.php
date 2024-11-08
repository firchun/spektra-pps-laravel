<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function SuperAdmin()
    {
        $data = [
            'title' => 'Super Admin',
            'role' => 'Super Admin'
        ];
        return view('admin.users.super_admin', $data);
    }
    public function AdminProvinsi()
    {
        $data = [
            'title' => 'Admin Provinsi',
            'role' => 'Admin Provinsi'
        ];
        return view('admin.users.admin_provinsi', $data);
    }
    public function AdminKabupaten()
    {
        $data = [
            'title' => 'Admin Kabupaten',
            'role' => 'Admin Kabupaten'
        ];
        return view('admin.users.admin_kabupaten', $data);
    }
    public function Operator()
    {
        $data = [
            'title' => 'Operator',
            'role' => 'Operator'
        ];
        return view('admin.users.operator', $data);
    }
    public function KadisProvinsi()
    {
        $data = [
            'title' => 'Kadis Provinsi',
            'role' => 'Kadis Provinsi'
        ];
        return view('admin.users.kadis_provinsi', $data);
    }
    public function KadisKabupaten()
    {
        $data = [
            'title' => 'Kadis Kabupaten',
            'role' => 'Kadis Kabupaten'
        ];
        return view('admin.users.kadis_kabupaten', $data);
    }
    public function getUsersDataTable($role)
    {
        $users = User::where('role', $role)->orderByDesc('id');

        return Datatables::of($users)

            ->addColumn('action', function ($user) {
                return view('admin.users.components.actions', compact('user'));
            })
            ->addColumn('role', function ($user) {
                return '<span class="badge bg-label-primary">' . $user->role . '</span>';
            })

            ->rawColumns(['action', 'role'])
            ->make(true);
    }
    public function store(Request $request)
    {
        if ($request->filled('id')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }


        if ($request->filled('id')) {
            $usersData = [
                'id_kabupaten' => $request->input('id_kabupaten') ?? null,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
            ];
            $user = User::find($request->input('id'));
            if (!$user) {
                return response()->json(['message' => 'user not found'], 404);
            }

            $user->update($usersData);
            $message = 'user updated successfully';
        } else {
            $usersData = [
                'id_kabupaten' => $request->input('id_kabupaten') ?? null,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'password' => Hash::make('password'),
            ];

            User::create($usersData);
            $message = 'user created successfully';
        }

        return response()->json(['message' => $message]);
    }
    public function edit($id)
    {
        $User = User::find($id);

        if (!$User) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($User);
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
