<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function monitoringckp_index(Request $request)
    {
        return view('pages.admin.monitoringckp.index');
    }

    public function monitoringckp_create(Request $request)
    {
        return view('pages.admin.monitoringckp.create');
    }

    public function monitoringpre_index(Request $request)
    {
        return view('pages.admin.monitoringpre.index');
    }

    public function monitoringpre_create(Request $request)
    {
        return view('pages.admin.monitoringpre.create');
    }
}
