<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonitoringCKPController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.monitoringckp.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.monitoringckp.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.monitoringckp.edit');
    }

}
