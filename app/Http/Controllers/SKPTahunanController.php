<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\skp_tahunan;
use App\Models\user;
use Illuminate\Http\Request;

class SKPTahunanController extends Controller
{
    //Admin

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
        return redirect('/perencanaankerja/skptahunan');
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
        return redirect('/perencanaankerja/skptahunan');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        return redirect('/perencanaankerja/skptahunan');
    }
}
