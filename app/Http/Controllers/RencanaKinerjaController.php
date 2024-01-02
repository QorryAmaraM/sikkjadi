<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\rencana_kinerja;
use Illuminate\Http\Request;

class REncanaKinerjaController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $rencanakinerja = rencana_kinerja::all();
        return view('pages.admin.rencanakinerja.index', compact(['rencanakinerja'])) ;
    }

    //Create
    public function create(Request $request)
    {
        return view('pages.admin.rencanakinerja.create');
    }

    public function store(Request $request)
    {
        rencana_kinerja::create($request->except(['_token','submit']));
        return redirect('/perencanaankerja/rencanakinerja');
    }

    //Update
    public function edit($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        return view('pages.admin.rencanakinerja.edit', compact(['rencanakinerja']));
    }

    public function update($id, Request $request)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->update($request->except(['_token','submit']));
        return redirect('/perencanaankerja/rencanakinerja');
    }

    //Destroy
    public function destroy($id)
    {
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->delete();
        return redirect('/perencanaankerja/rencanakinerja');
    }
}
