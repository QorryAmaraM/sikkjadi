<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\rencana_kinerja;
use Illuminate\Http\Request;

class REncanaKinerjaController extends Controller
{
    //Admin----------------------------------------------------------------------------------------------
    //Read
    public function admin_index(Request $request)
    {
        $rencanakinerja = rencana_kinerja::all();
        return view('pages.admin.rencanakinerja.index', compact(['rencanakinerja'])) ;
    }

    //Create
    public function admin_create(Request $request)
    {
        return view('pages.admin.rencanakinerja.create');
    }

    public function admin_store(Request $request)
    {
        rencana_kinerja::create($request->except(['_token','submit']));
        return redirect('/admin-perencanaankerja/rencanakinerja');
    }

    //Update
    public function admin_edit($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        return view('pages.admin.rencanakinerja.edit', compact(['rencanakinerja']));
    }

    public function admin_update($id, Request $request)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->update($request->except(['_token','submit']));
        return redirect('/admin-perencanaankerja/rencanakinerja');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->delete();
        return redirect('/admin-perencanaankerja/rencanakinerja');
    }

    //kepalabps----------------------------------------------------------------------------------------------
    //Read
    public function kepalabps_index(Request $request)
    {
        $rencanakinerja = rencana_kinerja::all();
        return view('pages.users.kepalabps.rencanakinerja.index', compact(['rencanakinerja'])) ;
    }

    //Create
    public function kepalabps_create(Request $request)
    {
        return view('pages.users.kepalabps.rencanakinerja.create');
    }

    public function kepalabps_store(Request $request)
    {
        rencana_kinerja::create($request->except(['_token','submit']));
        return redirect('/kepalabps-perencanaankerja/rencanakinerja');
    }

    //Update
    public function kepalabps_edit($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        return view('pages.users.kepalabps.rencanakinerja.edit', compact(['rencanakinerja']));
    }

    public function kepalabps_update($id, Request $request)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->update($request->except(['_token','submit']));
        return redirect('/kepalabps-perencanaankerja/rencanakinerja');
    }

    //Destroy
    public function kepalabps_destroy($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->delete();
        return redirect('/kepalabps-perencanaankerja/rencanakinerja');
    }

    //kepalabu----------------------------------------------------------------------------------------------
    //Read
    public function kepalabu_index(Request $request)
    {
        $rencanakinerja = rencana_kinerja::all();
        return view('pages.users.kepalabu.rencanakinerja.index', compact(['rencanakinerja'])) ;
    }

    //Create
    public function kepalabu_create(Request $request)
    {
        return view('pages.users.kepalabu.rencanakinerja.create');
    }

    public function kepalabu_store(Request $request)
    {
        rencana_kinerja::create($request->except(['_token','submit']));
        return redirect('/kepalabu-perencanaankerja/rencanakinerja');
    }

    //Update
    public function kepalabu_edit($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        return view('pages.users.kepalabu.rencanakinerja.edit', compact(['rencanakinerja']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->update($request->except(['_token','submit']));
        return redirect('/kepalabu-perencanaankerja/rencanakinerja');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->delete();
        return redirect('/kepalabu-perencanaankerja/rencanakinerja');
    }

    //kf----------------------------------------------------------------------------------------------
    //Read
    public function kf_index(Request $request)
    {
        $rencanakinerja = rencana_kinerja::all();
        return view('pages.users.kf.rencanakinerja.index', compact(['rencanakinerja'])) ;
    }

    //Create
    public function kf_create(Request $request)
    {
        return view('pages.users.kf.rencanakinerja.create');
    }

    public function kf_store(Request $request)
    {
        rencana_kinerja::create($request->except(['_token','submit']));
        return redirect('/kf-perencanaankerja/rencanakinerja');
    }

    //Update
    public function kf_edit($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        return view('pages.users.kf.rencanakinerja.edit', compact(['rencanakinerja']));
    }

    public function kf_update($id, Request $request)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->update($request->except(['_token','submit']));
        return redirect('/kf-perencanaankerja/rencanakinerja');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->delete();
        return redirect('/kf-perencanaankerja/rencanakinerja');
    }

    //staf----------------------------------------------------------------------------------------------
    //Read
    public function staf_index(Request $request)
    {
        $rencanakinerja = rencana_kinerja::all();
        return view('pages.users.staf.rencanakinerja.index', compact(['rencanakinerja'])) ;
    }

    //Create
    public function staf_create(Request $request)
    {
        return view('pages.users.staf.rencanakinerja.create');
    }

    public function staf_store(Request $request)
    {
        rencana_kinerja::create($request->except(['_token','submit']));
        return redirect('/staf-perencanaankerja/rencanakinerja');
    }

    //Update
    public function staf_edit($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        return view('pages.users.staf.rencanakinerja.edit', compact(['rencanakinerja']));
    }

    public function staf_update($id, Request $request)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->update($request->except(['_token','submit']));
        return redirect('/staf-perencanaankerja/rencanakinerja');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->delete();
        return redirect('/staf-perencanaankerja/rencanakinerja');
    }
}
