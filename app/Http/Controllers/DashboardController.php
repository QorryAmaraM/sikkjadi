<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard.index');
    }

    // DashboardController.php
    public function index1()
    {
        return view('pages.admin.dashboard.index');
    }

    public function index2()
    {
        return view('pages.users.kepalaBPS.dashboard.index');
    }

    public function index3()
    {
        return view('pages.users.kepalaBU.dashboard.index');
    }

    public function index4()
    {
        return view('pages.users.KF.dashboard.index');
    }

    public function index5()
    {
        return view('pages.users.staff.dashboard.index');
    }
}
