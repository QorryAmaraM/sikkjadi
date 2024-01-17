<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\skp_tahunan;
use App\Models\user;
use Illuminate\Http\Request;

class SKPTahunanController extends Controller
{
    //Admin----------------------------------------------------------------------------------------------
    //Read
    public function admin_index(Request $request)
    {
        $skptahunan = skp_tahunan::all();
        return view('pages.admin.skptahunan.index',compact(['skptahunan']));
    }

    //Create
    public function admin_create(Request $request)
    {
        $user = user::all();
        return view('pages.admin.skptahunan.create',compact(['user']));
    }

    public function admin_store(Request $request)
    {
        skp_tahunan::create($request->except(['_token','submit']));
        return redirect('/admin-perencanaankerja/skptahunan');
    }

    //Update
    public function admin_edit($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $user = user::all();
        return view('pages.admin.skptahunan.edit', compact(['skptahunan','user']));
    }

    public function admin_update($id, Request $request)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->update($request->except(['_token','submit']));
        return redirect('/admin-perencanaankerja/skptahunan');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        return redirect('/admin-perencanaankerja/skptahunan');
    }

    //kepalabps----------------------------------------------------------------------------------------------
    //Read
    public function kepalabps_index(Request $request)
    {
        $skptahunan = skp_tahunan::all();
        return view('pages.users.kepalabps.skptahunan.index',compact(['skptahunan']));
    }

    //Create
    public function kepalabps_create(Request $request)
    {
        $user = user::all();
        return view('pages.users.kepalabps.skptahunan.create',compact(['user']));
    }

    public function kepalabps_store(Request $request)
    {
        skp_tahunan::create($request->except(['_token','submit']));
        return redirect('/kepalabps-perencanaankerja/skptahunan');
    }

    //Update
    public function kepalabps_edit($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $user = user::all();
        return view('pages.users.kepalabps.skptahunan.edit', compact(['skptahunan','user']));
    }

    public function kepalabps_update($id, Request $request)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->update($request->except(['_token','submit']));
        return redirect('/kepalabps-perencanaankerja/skptahunan');
    }

    //Destroy
    public function kepalabps_destroy($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        return redirect('/kepalabps-perencanaankerja/skptahunan');
    }

    //kepalabu----------------------------------------------------------------------------------------------
    //Read
    public function kepalabu_index(Request $request)
    {
        $skptahunan = skp_tahunan::all();
        return view('pages.users.kepalabu.skptahunan.index',compact(['skptahunan']));
    }

    //Create
    public function kepalabu_create(Request $request)
    {
        $user = user::all();
        return view('pages.users.kepalabu.skptahunan.create',compact(['user']));
    }

    public function kepalabu_store(Request $request)
    {
        skp_tahunan::create($request->except(['_token','submit']));
        return redirect('/kepalabu-perencanaankerja/skptahunan');
    }

    //Update
    public function kepalabu_edit($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $user = user::all();
        return view('pages.users.kepalabu.skptahunan.edit', compact(['skptahunan','user']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->update($request->except(['_token','submit']));
        return redirect('/kepalabu-perencanaankerja/skptahunan');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        return redirect('/kepalabu-perencanaankerja/skptahunan');
    }

    //kf----------------------------------------------------------------------------------------------
    //Read
    public function kf_index(Request $request)
    {
        $skptahunan = skp_tahunan::all();
        return view('pages.users.kf.skptahunan.index',compact(['skptahunan']));
    }

    //Create
    public function kf_create(Request $request)
    {
        $user = user::all();
        return view('pages.users.kf.skptahunan.create',compact(['user']));
    }

    public function kf_store(Request $request)
    {
        skp_tahunan::create($request->except(['_token','submit']));
        return redirect('/kf-perencanaankerja/skptahunan');
    }

    //Update
    public function kf_edit($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $user = user::all();
        return view('pages.users.kf.skptahunan.edit', compact(['skptahunan','user']));
    }

    public function kf_update($id, Request $request)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->update($request->except(['_token','submit']));
        return redirect('/kf-perencanaankerja/skptahunan');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        return redirect('/kf-perencanaankerja/skptahunan');
    }

    //staf----------------------------------------------------------------------------------------------
    //Read
    public function staf_index(Request $request)
    {
        $skptahunan = skp_tahunan::all();
        return view('pages.users.staf.skptahunan.index',compact(['skptahunan']));
    }

    //Create
    public function staf_create(Request $request)
    {
        $user = user::all();
        return view('pages.users.staf.skptahunan.create',compact(['user']));
    }

    public function staf_store(Request $request)
    {
        skp_tahunan::create($request->except(['_token','submit']));
        return redirect('/staf-perencanaankerja/skptahunan');
    }

    //Update
    public function staf_edit($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $user = user::all();
        return view('pages.users.staf.skptahunan.edit', compact(['skptahunan','user']));
    }

    public function staf_update($id, Request $request)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->update($request->except(['_token','submit']));
        return redirect('/staf-perencanaankerja/skptahunan');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        return redirect('/staf-perencanaankerja/skptahunan');
    }

}
