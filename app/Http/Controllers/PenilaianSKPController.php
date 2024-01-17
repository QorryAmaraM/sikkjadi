<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaian_skp;
use Illuminate\Http\Request;

class PenilaianSKPController extends Controller
{
    //admin-----------------------------------------------------------------------------------------------
    //Read
    public function admin_index(Request $request)
    {
        $penilaianskp = penilaian_skp::all();
        return view('pages.admin.penilaianskp.index', compact(['penilaianskp']));
    }

    //Create
    public function admin_create(Request $request)
    {
        return view('pages.admin.penilaianskp.create');
    }

    public function admin_store(Request $request)
    {
        penilaian_skp::create($request->except(['_token','submit']));
        return redirect('/admin-perencanaankerja/penilaianskp');
    }

    //Update
    public function admin_edit($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        return view('pages.admin.penilaianskp.edit', compact(['penilaianskp']));
    }

    public function admin_update($id, Request $request)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->update($request->except(['_token','submit']));
        return redirect('/admin-perencanaankerja/penilaianskp');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->delete();
        return redirect('/admin-perencanaankerja/penilaianskp');
    }

    //kepalabps-----------------------------------------------------------------------------------------------
    //Read
    public function kepalabps_index(Request $request)
    {
        $penilaianskp = penilaian_skp::all();
        return view('pages.users.kepalabps.penilaianskp.index', compact(['penilaianskp']));
    }

    //Create
    public function kepalabps_create(Request $request)
    {
        return view('pages.users.kepalabps.penilaianskp.create');
    }

    public function kepalabps_store(Request $request)
    {
        penilaian_skp::create($request->except(['_token','submit']));
        return redirect('/kepalabps-perencanaankerja/penilaianskp');
    }

    //Update
    public function kepalabps_edit($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        return view('pages.users.kepalabps.penilaianskp.edit', compact(['penilaianskp']));
    }

    public function kepalabps_update($id, Request $request)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->update($request->except(['_token','submit']));
        return redirect('/kepalabps-perencanaankerja/penilaianskp');
    }

    //Destroy
    public function kepalabps_destroy($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->delete();
        return redirect('/kepalabps-perencanaankerja/penilaianskp');
    }

    //kepalabu-----------------------------------------------------------------------------------------------
    //Read
    public function kepalabu_index(Request $request)
    {
        $penilaianskp = penilaian_skp::all();
        return view('pages.users.kepalabu.penilaianskp.index', compact(['penilaianskp']));
    }

    //Create
    public function kepalabu_create(Request $request)
    {
        return view('pages.users.kepalabu.penilaianskp.create');
    }

    public function kepalabu_store(Request $request)
    {
        penilaian_skp::create($request->except(['_token','submit']));
        return redirect('/kepalabu-perencanaankerja/penilaianskp');
    }

    //Update
    public function kepalabu_edit($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        return view('pages.users.kepalabu.penilaianskp.edit', compact(['penilaianskp']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->update($request->except(['_token','submit']));
        return redirect('/kepalabu-perencanaankerja/penilaianskp');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->delete();
        return redirect('/kepalabu-perencanaankerja/penilaianskp');
    }

    //kf-----------------------------------------------------------------------------------------------
    //Read
    public function kf_index(Request $request)
    {
        $penilaianskp = penilaian_skp::all();
        return view('pages.users.kf.penilaianskp.index', compact(['penilaianskp']));
    }

    //Create
    public function kf_create(Request $request)
    {
        return view('pages.users.kf.penilaianskp.create');
    }

    public function kf_store(Request $request)
    {
        penilaian_skp::create($request->except(['_token','submit']));
        return redirect('/kf-perencanaankerja/penilaianskp');
    }

    //Update
    public function kf_edit($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        return view('pages.users.kf.penilaianskp.edit', compact(['penilaianskp']));
    }

    public function kf_update($id, Request $request)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->update($request->except(['_token','submit']));
        return redirect('/kf-perencanaankerja/penilaianskp');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->delete();
        return redirect('/kf-perencanaankerja/penilaianskp');
    }

    //staf-----------------------------------------------------------------------------------------------
    //Read
    public function staf_index(Request $request)
    {
        $penilaianskp = penilaian_skp::all();
        return view('pages.users.staf.penilaianskp.index', compact(['penilaianskp']));
    }

    //Create
    public function staf_create(Request $request)
    {
        return view('pages.users.staf.penilaianskp.create');
    }

    public function staf_store(Request $request)
    {
        penilaian_skp::create($request->except(['_token','submit']));
        return redirect('/staf-perencanaankerja/penilaianskp');
    }

    //Update
    public function staf_edit($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        return view('pages.users.staf.penilaianskp.edit', compact(['penilaianskp']));
    }

    public function staf_update($id, Request $request)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->update($request->except(['_token','submit']));
        return redirect('/staf-perencanaankerja/penilaianskp');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->delete();
        return redirect('/staf-perencanaankerja/penilaianskp');
    }
}
