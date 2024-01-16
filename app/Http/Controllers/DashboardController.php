<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     // DashboardController.php
    public function admin_dashboard()
    {
        return view('pages.admin.dashboard.index');
    }

    public function kepalabps_dashboard()
    {
        return view('pages.users.kepalaBPS.dashboard.index');
    }

    public function kepalabu_dashboard()
    {
        return view('pages.users.kepalaBU.dashboard.index');
    }

    public function kf_dashboard()
    {
        return view('pages.users.KF.dashboard.index');
    }

    public function staff_dashboard()
    {
        return view('pages.users.staff.dashboard.index');
    }
}
