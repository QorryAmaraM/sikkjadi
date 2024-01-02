<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\monitoring_ckp;
use Illuminate\Http\Request;

class MonitoringCKPController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $monitoringckp = monitoring_ckp::all();
        return view('pages.admin.monitoringckp.index', compact(['monitoringckp']));
    }

    //Create
    public function create(Request $request)
    {
        return view('pages.admin.monitoringckp.create');
    }

    public function store(Request $request)
    {
        monitoring_ckp::create($request->except(['_token','submit']));
        return redirect('/monitoring/monitoringckp');
    }

    //Update
    public function edit($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        return view('pages.admin.ckpr.edit', compact(['monitoringckp']));
    }

    public function update($id, Request $request)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->update($request->except(['_token','submit']));
        return redirect('/monitoring/monitoringckp');
    }

    //Destroy
    public function destroy($id)
    {
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->delete();
        return redirect('/monitoring/monitoringckp');
    }

}
