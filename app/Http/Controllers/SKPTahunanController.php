<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\skp_tahunan;
use App\Models\user;
use Illuminate\Http\Request;

class SKPTahunanController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $skptahunan = skp_tahunan::all();
        return view('pages.admin.skptahunan.index',compact(['skptahunan']));
    }

    //Create
    public function create(Request $request)
    {
        $user = user::all();
        return view('pages.admin.skptahunan.create',compact(['user']));
    }

    public function store(Request $request)
    {
        skp_tahunan::create($request->except(['_token','submit']));
        return redirect('/perencanaankerja/skptahunan');
    }

    //Update
    public function edit($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $user = user::all();
        return view('pages.admin.skptahunan.edit', compact(['skptahunan','user']));
    }

    public function update($id, Request $request)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->update($request->except(['_token','submit']));
        return redirect('/perencanaankerja/skptahunan');
    }

    //Destroy
    public function destroy($id)
    {
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        return redirect('/perencanaankerja/skptahunan');
    }
}
