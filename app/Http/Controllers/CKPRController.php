<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpr;
use Illuminate\Http\Request;

class CKPRController extends Controller
{
    //Admin------------------------------------------------------------------------------------
    //Read
    public function admin_index(Request $request)
    {
        $ckpr = ckpr::all();
        return view('pages.admin.ckpr.index', compact(['ckpr']));
    }

    //Create
    public function admin_create(Request $request)
    {
        return view('pages.admin.ckpr.create');
    }

    public function admin_store(Request $request)
    {
        ckpr::create($request->except(['_token','submit']));
        return redirect('/admin-ckp/ckpr');
    }

    //Update
    public function admin_edit($id)
    {
        $ckpr = ckpr::find($id);
        return view('pages.admin.ckpr.edit', compact(['ckpr']));
    }

    public function admin_update($id, Request $request)
    {
        $ckpr = ckpr::find($id);
        $ckpr->update($request->except(['_token','submit']));
        return redirect('/admin-ckp/ckpr');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $ckpr = ckpr::find($id);
        $ckpr->delete();
        return redirect('/admin-ckp/ckpr');
    }


    //Kepala BPS------------------------------------------------------------------------------------
    //Read
    public function kepalabps_index(Request $request)
    {
        $ckpr = ckpr::all();
        return view('pages.users.kepalabps.ckpr.index', compact(['ckpr']));
    }

    //Create
    public function kepalabps_create(Request $request)
    {
        return view('pages.users.kepalabps.ckpr.create');
    }

    public function kepalabps_store(Request $request)
    {
        ckpr::create($request->except(['_token','submit']));
        return redirect('/kepalabps-ckp/ckpr');
    }

    //Update
    public function kepalabps_edit($id)
    {
        $ckpr = ckpr::find($id);
        return view('pages.users.kepalabps.ckpr.edit', compact(['ckpr']));
    }

    public function kepalabps_update($id, Request $request)
    {
        $ckpr = ckpr::find($id);
        $ckpr->update($request->except(['_token','submit']));
        return redirect('/kepalabps-ckp/ckpr');
    }

    //Destroy
    public function kepalabps_destroy($id)
    {
        $ckpr = ckpr::find($id);
        $ckpr->delete();
        return redirect('/kepalabps-ckp/ckpr');
    }


    //Kepala BU------------------------------------------------------------------------------------
    //Read
    public function kepalabu_index(Request $request)
    {
        $ckpr = ckpr::all();
        return view('pages.users.kepalabu.ckpr.index', compact(['ckpr']));
    }

    //Create
    public function kepalabu_create(Request $request)
    {
        return view('pages.users.kepalabu.ckpr.create');
    }

    public function kepalabu_store(Request $request)
    {
        ckpr::create($request->except(['_token','submit']));
        return redirect('/kepalabu-ckp/ckpr');
    }

    //Update
    public function kepalabu_edit($id)
    {
        $ckpr = ckpr::find($id);
        return view('pages.users.kepalabu.ckpr.edit', compact(['ckpr']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $ckpr = ckpr::find($id);
        $ckpr->update($request->except(['_token','submit']));
        return redirect('/kepalabu-ckp/ckpr');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $ckpr = ckpr::find($id);
        $ckpr->delete();
        return redirect('/kepalabu-ckp/ckpr');
    }


    //KF------------------------------------------------------------------------------------
    //Read
    public function kf_index(Request $request)
    {
        $ckpr = ckpr::all();
        return view('pages.users.kf.ckpr.index', compact(['ckpr']));
    }

    //Create
    public function kf_create(Request $request)
    {
        return view('pages.users.kf.ckpr.create');
    }

    public function kf_store(Request $request)
    {
        ckpr::create($request->except(['_token','submit']));
        return redirect('/kf-ckp/ckpr');
    }

    //Update
    public function kf_edit($id)
    {
        $ckpr = ckpr::find($id);
        return view('pages.users.kf.ckpr.edit', compact(['ckpr']));
    }

    public function kf_update($id, Request $request)
    {
        $ckpr = ckpr::find($id);
        $ckpr->update($request->except(['_token','submit']));
        return redirect('/kf-ckp/ckpr');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $ckpr = ckpr::find($id);
        $ckpr->delete();
        return redirect('/kf-ckp/ckpr');
    }


    //staf------------------------------------------------------------------------------------
    //Read
    public function staf_index(Request $request)
    {
        $ckpr = ckpr::all();
        return view('pages.users.staf.ckpr.index', compact(['ckpr']));
    }

    //Create
    public function staf_create(Request $request)
    {
        return view('pages.users.staf.ckpr.create');
    }

    public function staf_store(Request $request)
    {
        ckpr::create($request->except(['_token','submit']));
        return redirect('/staf-ckp/ckpr');
    }

    //Update
    public function staf_edit($id)
    {
        $ckpr = ckpr::find($id);
        return view('pages.users.staf.ckpr.edit', compact(['ckpr']));
    }

    public function staf_update($id, Request $request)
    {
        $ckpr = ckpr::find($id);
        $ckpr->update($request->except(['_token','submit']));
        return redirect('/staf-ckp/ckpr');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $ckpr = ckpr::find($id);
        $ckpr->delete();
        return redirect('/staf-ckp/ckpr');
    }

}
