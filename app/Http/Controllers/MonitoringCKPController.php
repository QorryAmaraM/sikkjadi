<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\monitoring_ckp;
use Illuminate\Http\Request;

class MonitoringCKPController extends Controller
{
    //Admin--------------------------------------------------------------------------------------------
    //Read
    public function admin_index(Request $request)
    {
        $monitoringckp = monitoring_ckp::all();
        return view('pages.admin.monitoringckp.index', compact(['monitoringckp']));
    }

    //Create
    public function admin_create(Request $request)
    {
        return view('pages.admin.monitoringckp.create');
    }

    public function admin_store(Request $request)
    {
        monitoring_ckp::create($request->except(['_token','submit']));
        return redirect('/admin-monitoring/monitoringckp');
    }

    //Update
    public function admin_edit($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        return view('pages.admin.ckpr.edit', compact(['monitoringckp']));
    }

    public function admin_update($id, Request $request)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->update($request->except(['_token','submit']));
        return redirect('/admin-monitoring/monitoringckp');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->delete();
        return redirect('/admin-monitoring/monitoringckp');
    }

    //kepalabps--------------------------------------------------------------------------------------------
    //Read
    public function kepalabps_index(Request $request)
    {
        $monitoringckp = monitoring_ckp::all();
        return view('pages.users.kepalabps.monitoringckp.index', compact(['monitoringckp']));
    }

    //Create
    public function kepalabps_create(Request $request)
    {
        return view('pages.users.kepalabps.monitoringckp.create');
    }

    public function kepalabps_store(Request $request)
    {
        monitoring_ckp::create($request->except(['_token','submit']));
        return redirect('/kepalabps-monitoring/monitoringckp');
    }

    //Update
    public function kepalabps_edit($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        return view('pages.users.kepalabps.ckpr.edit', compact(['monitoringckp']));
    }

    public function kepalabps_update($id, Request $request)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->update($request->except(['_token','submit']));
        return redirect('/kepalabps-monitoring/monitoringckp');
    }

    //Destroy
    public function kepalabps_destroy($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->delete();
        return redirect('/kepalabps-monitoring/monitoringckp');
    }

    //kepalabu--------------------------------------------------------------------------------------------
    //Read
    public function kepalabu_index(Request $request)
    {
        $monitoringckp = monitoring_ckp::all();
        return view('pages.users.kepalabu.monitoringckp.index', compact(['monitoringckp']));
    }

    //Create
    public function kepalabu_create(Request $request)
    {
        return view('pages.users.kepalabu.monitoringckp.create');
    }

    public function kepalabu_store(Request $request)
    {
        monitoring_ckp::create($request->except(['_token','submit']));
        return redirect('/kepalabu-monitoring/monitoringckp');
    }

    //Update
    public function kepalabu_edit($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        return view('pages.users.kepalabu.ckpr.edit', compact(['monitoringckp']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->update($request->except(['_token','submit']));
        return redirect('/kepalabu-monitoring/monitoringckp');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->delete();
        return redirect('/kepalabu-monitoring/monitoringckp');
    }

    //kf--------------------------------------------------------------------------------------------
    //Read
    public function kf_index(Request $request)
    {
        $monitoringckp = monitoring_ckp::all();
        return view('pages.users.kf.monitoringckp.index', compact(['monitoringckp']));
    }

    //Create
    public function kf_create(Request $request)
    {
        return view('pages.users.kf.monitoringckp.create');
    }

    public function kf_store(Request $request)
    {
        monitoring_ckp::create($request->except(['_token','submit']));
        return redirect('/kf-monitoring/monitoringckp');
    }

    //Update
    public function kf_edit($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        return view('pages.users.kf.ckpr.edit', compact(['monitoringckp']));
    }

    public function kf_update($id, Request $request)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->update($request->except(['_token','submit']));
        return redirect('/kf-monitoring/monitoringckp');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->delete();
        return redirect('/kf-monitoring/monitoringckp');
    }

    //staf--------------------------------------------------------------------------------------------
    //Read
    public function staf_index(Request $request)
    {
        $monitoringckp = monitoring_ckp::all();
        return view('pages.users.staf.monitoringckp.index', compact(['monitoringckp']));
    }

    //Create
    public function staf_create(Request $request)
    {
        return view('pages.users.staf.monitoringckp.create');
    }

    public function staf_store(Request $request)
    {
        monitoring_ckp::create($request->except(['_token','submit']));
        return redirect('/staf-monitoring/monitoringckp');
    }

    //Update
    public function staf_edit($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        return view('pages.users.staf.ckpr.edit', compact(['monitoringckp']));
    }

    public function staf_update($id, Request $request)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->update($request->except(['_token','submit']));
        return redirect('/staf-monitoring/monitoringckp');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->delete();
        return redirect('/staf-monitoring/monitoringckp');
    }

}
