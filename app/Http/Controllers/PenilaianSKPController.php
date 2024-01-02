<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaian_skp;
use Illuminate\Http\Request;

class PenilaianSKPController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $penilaianskp = penilaian_skp::all();
        return view('pages.admin.penilaianskp.index', compact(['penilaianskp']));
    }

    //Create
    public function create(Request $request)
    {
        return view('pages.admin.penilaianskp.create');
    }

    public function store(Request $request)
    {
        penilaian_skp::create($request->except(['_token','submit']));
        return redirect('/perencanaankerja/penilaianskp');
    }

    //Update
    public function edit($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        return view('pages.admin.penilaianskp.edit', compact(['penilaianskp']));
    }

    public function update($id, Request $request)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->update($request->except(['_token','submit']));
        return redirect('/perencanaankerja/penilaianskp');
    }

    //Destroy
    public function destroy($id)
    {
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->delete();
        return redirect('/perencanaankerja/penilaianskp');
    }
}
