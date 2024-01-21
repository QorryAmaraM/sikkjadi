<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\monitoring_presensi;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MonitoringPresensiController extends Controller
{
    //Read 
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $monitoringpresensi = monitoring_presensi::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.monitoringpre.index', compact(['monitoringpresensi']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.index', compact(['monitoringpresensi']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.index', compact(['monitoringpresensi']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.index', compact(['monitoringpresensi']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.index', compact(['monitoringpresensi']));
                break;
        }
    }

    //Create
    public function create(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.monitoringpre.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.create', compact(['user']));
                break;
        }
    }


    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        monitoring_presensi::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringpre');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringpre');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringpre');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringpre');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringpre');
                break;
        }
    }

    //Update    
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $monitoringpresensi = monitoring_presensi::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringpre');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringpre');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringpre');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringpre');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringpre');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringpre');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringpre');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringpre');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringpre');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringpre');
                break;
        }
    }
}

