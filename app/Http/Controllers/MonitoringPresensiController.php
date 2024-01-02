<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\monitoring_presensi;
use Illuminate\Http\Request;

class MonitoringPresensiController extends Controller
{
    //Read 
    public function index(Request $request)
    {
        $monitoringpresensi = monitoring_presensi::all();
        return view('pages.admin.monitoringpre.index', compact(['monitoringpresensi']));
    }

    //Create
    public function create(Request $request)
    {
        return view('pages.admin.monitoringpre.create');
    }

    public function store(Request $request)
    {
        monitoring_presensi::create($request->except(['_token','submit']));
        return redirect('/monitoring/monitoringpre');
    }

    //Update    
    
    public function edit($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        return view('pages.admin.monitoringpre.edit', compact(['monitoringpresensi']));
    }

    public function update($id, Request $request)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->update($request->except(['_token','submit']));
        return redirect('/monitoring/monitoringpre');
    }

    //Destroy
    public function destroy($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->delete();
        return redirect('/monitoring/monitoringpre');
    }
}
