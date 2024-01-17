<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpt;
use Illuminate\Http\Request;

class CKPTController extends Controller
{
    //Admin------------------------------------------------------------------------------------
    //Read
    public function admin_depan(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.admin.ckpt.depan', compact(['ckpt']));
    }
    
    public function admin_index(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.admin.ckpt.index', compact(['ckpt']));
    }

    //Cread
    public function admin_create(Request $request)
    {
        return view('pages.admin.ckpt.create');
    }

    public function admin_store(Request $request)
    {
        ckpt::create($request->except(['_token','submit']));
        return redirect('/admin-ckp/ckpt');
    }

    //Update
    public function admin_edit($id)
    {
        $ckpt = ckpt::find($id);
        return view('pages.admin.ckpt.edit', compact(['ckpt']));
    }

    public function admin_update($id, Request $request)
    {
        $ckpt = ckpt::find($id);
        $ckpt->update($request->except(['_token','submit']));
        return redirect('/admin-ckp/ckpt');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $ckpt = ckpt::find($id);
        $ckpt->delete();
        return redirect('/admin-ckp/ckpt');
    }

    //Kepala BPS------------------------------------------------------------------------------------
    //Read
    public function kepalabps_depan(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.users.kepalabps.ckpt.depan', compact(['ckpt']));
    }
    
    public function kepalabps_index(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.users.kepalabps.ckpt.index', compact(['ckpt']));
    }

    //Cread
    public function kepalabps_create(Request $request)
    {
        return view('pages.users.kepalabps.ckpt.create');
    }

    public function kepalabps_store(Request $request)
    {
        ckpt::create($request->except(['_token','submit']));
        return redirect('/kepalabps-ckp/ckpt');
    }

    //Update
    public function kepalabps_edit($id)
    {
        $ckpt = ckpt::find($id);
        return view('pages.users.kepalabps.ckpt.edit', compact(['ckpt']));
    }

    public function kepalabps_update($id, Request $request)
    {
        $ckpt = ckpt::find($id);
        $ckpt->update($request->except(['_token','submit']));
        return redirect('/kepalabps-ckp/ckpt');
    }

    //Destroy
    public function kepalabps_destroy($id)
    {
        $ckpt = ckpt::find($id);
        $ckpt->delete();
        return redirect('/kepalabps-ckp/ckpt');
    }

    //Kepala BU------------------------------------------------------------------------------------
    //Read
    public function kepalabu_depan(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.users.kepalabu.ckpt.depan', compact(['ckpt']));
    }
    
    public function kepalabu_index(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.users.kepalabu.ckpt.index', compact(['ckpt']));
    }

    //Cread
    public function kepalabu_create(Request $request)
    {
        return view('pages.users.kepalabu.ckpt.create');
    }

    public function kepalabu_store(Request $request)
    {
        ckpt::create($request->except(['_token','submit']));
        return redirect('/kepalabu-ckp/ckpt');
    }

    //Update
    public function kepalabu_edit($id)
    {
        $ckpt = ckpt::find($id);
        return view('pages.users.kepalabu.ckpt.edit', compact(['ckpt']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $ckpt = ckpt::find($id);
        $ckpt->update($request->except(['_token','submit']));
        return redirect('/kepalabu-ckp/ckpt');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $ckpt = ckpt::find($id);
        $ckpt->delete();
        return redirect('/kepalabu-ckp/ckpt');
    }

    //KF------------------------------------------------------------------------------------
    //Read
    public function kf_depan(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.users.kf.ckpt.depan', compact(['ckpt']));
    }
    
    public function kf_index(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.users.kf.ckpt.index', compact(['ckpt']));
    }

    //Cread
    public function kf_create(Request $request)
    {
        return view('pages.users.kf.ckpt.create');
    }

    public function kf_store(Request $request)
    {
        ckpt::create($request->except(['_token','submit']));
        return redirect('/kf-ckp/ckpt');
    }

    //Update
    public function kf_edit($id)
    {
        $ckpt = ckpt::find($id);
        return view('pages.users.kf.ckpt.edit', compact(['ckpt']));
    }

    public function kf_update($id, Request $request)
    {
        $ckpt = ckpt::find($id);
        $ckpt->update($request->except(['_token','submit']));
        return redirect('/kf-ckp/ckpt');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $ckpt = ckpt::find($id);
        $ckpt->delete();
        return redirect('/kf-ckp/ckpt');
    }

    //Ftaf------------------------------------------------------------------------------------
    //Read
    public function staf_depan(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.users.staf.ckpt.depan', compact(['ckpt']));
    }
    
    public function staf_index(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.users.staf.ckpt.index', compact(['ckpt']));
    }

    //Cread
    public function staf_create(Request $request)
    {
        return view('pages.users.staf.ckpt.create');
    }

    public function staf_store(Request $request)
    {
        ckpt::create($request->except(['_token','submit']));
        return redirect('/staf-ckp/ckpt');
    }

    //Update
    public function staf_edit($id)
    {
        $ckpt = ckpt::find($id);
        return view('pages.users.staf.ckpt.edit', compact(['ckpt']));
    }

    public function staf_update($id, Request $request)
    {
        $ckpt = ckpt::find($id);
        $ckpt->update($request->except(['_token','submit']));
        return redirect('/staf-ckp/ckpt');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $ckpt = ckpt::find($id);
        $ckpt->delete();
        return redirect('/staf-ckp/ckpt');
    }



    

    
}
