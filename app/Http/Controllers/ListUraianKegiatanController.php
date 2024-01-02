<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\list_uraian_kegiatan;
use Illuminate\Http\Request;

class ListUraianKegiatanController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::all();
        return view('pages.admin.uraiankegiatan.index', compact(['uraiankegiatan']));
    }

    //Create
    public function create(Request $request)
    {
        return view('pages.admin.uraiankegiatan.create');
    }

    public function store(Request $request)
    {
        list_uraian_kegiatan::create($request->except(['_token','submit']));
        return redirect('/masteruraiankegiatan/uraiankegiatan');
    }

    //Update
    public function edit($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        return view('pages.admin.uraiankegiatan.edit', compact(['uraiankegiatan']));
    }

    public function update($id, Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->update($request->except(['_token','submit']));
        return redirect('/masteruraiankegiatan/uraiankegiatan');
    }

    //Destroy
    public function destroy($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->delete();
        return redirect('/masteruraiankegiatan/uraiankegiatan');
    }
}
