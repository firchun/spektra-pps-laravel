<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Main Menu',
        ];
        return view('admin.dashboard', $data);
    }
    public function dashboardAdmin()
    {
        $data = [
            'title' => 'Dashboard',
            'users' => User::count(),
            'customers' => Customer::count()
        ];
        return view('admin.dashboard', $data);
    }
    public function dashboardSuperAdmin()
    {
        $data = [
            'title' => 'Dashboard',
            'users' => User::count(),
            'customers' => Customer::count()
        ];
        return view('admin.dashboard', $data);
    }
    public function dashboardSpektra()
    {
        $data = [
            'title' => 'Dashboard',
            'users' => User::count(),
            'customers' => Customer::count()
        ];
        return view('admin.dashboard', $data);
    }
}
