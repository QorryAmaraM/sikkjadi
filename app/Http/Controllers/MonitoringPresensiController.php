<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\monitoring_presensi;
use Illuminate\Http\Request;

class MonitoringPresensiController extends Controller
{
    //admin--------------------------------------------------------------------------------------------
    //Read 
    public function admin_index(Request $request)
    {
        $monitoringpresensi = monitoring_presensi::all();
        return view('pages.admin.monitoringpre.index', compact(['monitoringpresensi']));
    }

    //Create
    public function admin_create(Request $request)
    {
        return view('pages.admin.monitoringpre.create');
    }

    public function admin_store(Request $request)
    {
        monitoring_presensi::create($request->except(['_token','submit']));
        return redirect('/admin-monitoring/monitoringpre');
    }

    //Update    
    public function admin_edit($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        return view('pages.admin.monitoringpre.edit', compact(['monitoringpresensi']));
    }

    public function admin_update($id, Request $request)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->update($request->except(['_token','submit']));
        return redirect('/admin-monitoring/monitoringpre');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->delete();
        return redirect('/admin-monitoring/monitoringpre');
    }

    //kepalabps--------------------------------------------------------------------------------------------
    //Read 
    public function kepalabps_index(Request $request)
    {
        $monitoringpresensi = monitoring_presensi::all();
        return view('pages.users.kepalabps.monitoringpre.index', compact(['monitoringpresensi']));
    }

    //Create
    public function kepalabps_create(Request $request)
    {
        return view('pages.users.kepalabps.monitoringpre.create');
    }

    public function kepalabps_store(Request $request)
    {
        monitoring_presensi::create($request->except(['_token','submit']));
        return redirect('/kepalabps-monitoring/monitoringpre');
    }

    //Update    
    public function kepalabps_edit($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        return view('pages.users.kepalabps.monitoringpre.edit', compact(['monitoringpresensi']));
    }

    public function kepalabps_update($id, Request $request)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->update($request->except(['_token','submit']));
        return redirect('/kepalabps-monitoring/monitoringpre');
    }

    //Destroy
    public function kepalabps_destroy($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->delete();
        return redirect('/kepalabps-monitoring/monitoringpre');
    }

    //kepalabu--------------------------------------------------------------------------------------------
    //Read 
    public function kepalabu_index(Request $request)
    {
        $monitoringpresensi = monitoring_presensi::all();
        return view('pages.users.kepalabu.monitoringpre.index', compact(['monitoringpresensi']));
    }

    //Create
    public function kepalabu_create(Request $request)
    {
        return view('pages.users.kepalabu.monitoringpre.create');
    }

    public function kepalabu_store(Request $request)
    {
        monitoring_presensi::create($request->except(['_token','submit']));
        return redirect('/kepalabu-monitoring/monitoringpre');
    }

    //Update    
    public function kepalabu_edit($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        return view('pages.users.kepalabu.monitoringpre.edit', compact(['monitoringpresensi']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->update($request->except(['_token','submit']));
        return redirect('/kepalabu-monitoring/monitoringpre');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->delete();
        return redirect('/kepalabu-monitoring/monitoringpre');
    }

    //kf--------------------------------------------------------------------------------------------
    //Read 
    public function kf_index(Request $request)
    {
        $monitoringpresensi = monitoring_presensi::all();
        return view('pages.users.kf.monitoringpre.index', compact(['monitoringpresensi']));
    }

    //Create
    public function kf_create(Request $request)
    {
        return view('pages.users.kf.monitoringpre.create');
    }

    public function kf_store(Request $request)
    {
        monitoring_presensi::create($request->except(['_token','submit']));
        return redirect('/kf-monitoring/monitoringpre');
    }

    //Update    
    public function kf_edit($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        return view('pages.users.kf.monitoringpre.edit', compact(['monitoringpresensi']));
    }

    public function kf_update($id, Request $request)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->update($request->except(['_token','submit']));
        return redirect('/kf-monitoring/monitoringpre');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->delete();
        return redirect('/kf-monitoring/monitoringpre');
    }

    //staf--------------------------------------------------------------------------------------------
    //Read 
    public function staf_index(Request $request)
    {
        $monitoringpresensi = monitoring_presensi::all();
        return view('pages.users.staf.monitoringpre.index', compact(['monitoringpresensi']));
    }

    //Create
    public function staf_create(Request $request)
    {
        return view('pages.users.staf.monitoringpre.create');
    }

    public function staf_store(Request $request)
    {
        monitoring_presensi::create($request->except(['_token','submit']));
        return redirect('/staf-monitoring/monitoringpre');
    }

    //Update    
    public function staf_edit($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        return view('pages.users.staf.monitoringpre.edit', compact(['monitoringpresensi']));
    }

    public function staf_update($id, Request $request)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->update($request->except(['_token','submit']));
        return redirect('/staf-monitoring/monitoringpre');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->delete();
        return redirect('/staf-monitoring/monitoringpre');
    }
}
