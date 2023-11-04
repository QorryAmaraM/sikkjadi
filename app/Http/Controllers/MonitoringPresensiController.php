<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonitoringPresensiController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.monitoringpre.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.monitoringpre.create');
    }
    
    public function edit(Request $request)
    {
        return view('pages.admin.monitoringpre.edit');
    }
}
