<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\list_uraian_kegiatan;
use Illuminate\Http\Request;

class ListUraianKegiatanController extends Controller
{
    //Admin----------------------------------------------------------------------------------------------------
    //Read
    public function admin_index(Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::all();
        return view('pages.admin.uraiankegiatan.index', compact(['uraiankegiatan']));
    }

    //Create
    public function admin_create(Request $request)
    {
        return view('pages.admin.uraiankegiatan.create');
    }

    public function admin_store(Request $request)
    {
        list_uraian_kegiatan::create($request->except(['_token','submit']));
        return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
    }

    //Update
    public function admin_edit($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        return view('pages.admin.uraiankegiatan.edit', compact(['uraiankegiatan']));
    }

    public function admin_update($id, Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->update($request->except(['_token','submit']));
        return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->delete();
        return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
    }

    //Kepalabps----------------------------------------------------------------------------------------------------
    //Read
    public function Kepalabps_index(Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::all();
        return view('pages.users.Kepalabps.uraiankegiatan.index', compact(['uraiankegiatan']));
    }

    //Create
    public function Kepalabps_create(Request $request)
    {
        return view('pages.users.Kepalabps.uraiankegiatan.create');
    }

    public function Kepalabps_store(Request $request)
    {
        list_uraian_kegiatan::create($request->except(['_token','submit']));
        return redirect('/Kepalabps-masteruraiankegiatan/uraiankegiatan');
    }

    //Update
    public function Kepalabps_edit($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        return view('pages.users.Kepalabps.uraiankegiatan.edit', compact(['uraiankegiatan']));
    }

    public function Kepalabps_update($id, Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->update($request->except(['_token','submit']));
        return redirect('/Kepalabps-masteruraiankegiatan/uraiankegiatan');
    }

    //Destroy
    public function Kepalabps_destroy($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->delete();
        return redirect('/Kepalabps-masteruraiankegiatan/uraiankegiatan');
    }

    //kepalabu----------------------------------------------------------------------------------------------------
    //Read
    public function kepalabu_index(Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::all();
        return view('pages.users.kepalabu.uraiankegiatan.index', compact(['uraiankegiatan']));
    }

    //Create
    public function kepalabu_create(Request $request)
    {
        return view('pages.users.kepalabu.uraiankegiatan.create');
    }

    public function kepalabu_store(Request $request)
    {
        list_uraian_kegiatan::create($request->except(['_token','submit']));
        return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
    }

    //Update
    public function kepalabu_edit($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        return view('pages.users.kepalabu.uraiankegiatan.edit', compact(['uraiankegiatan']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->update($request->except(['_token','submit']));
        return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->delete();
        return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
    }

    //kf----------------------------------------------------------------------------------------------------
    //Read
    public function kf_index(Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::all();
        return view('pages.users.kf.uraiankegiatan.index', compact(['uraiankegiatan']));
    }

    //Create
    public function kf_create(Request $request)
    {
        return view('pages.users.kf.uraiankegiatan.create');
    }

    public function kf_store(Request $request)
    {
        list_uraian_kegiatan::create($request->except(['_token','submit']));
        return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
    }

    //Update
    public function kf_edit($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        return view('pages.users.kf.uraiankegiatan.edit', compact(['uraiankegiatan']));
    }

    public function kf_update($id, Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->update($request->except(['_token','submit']));
        return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->delete();
        return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
    }

    //staf----------------------------------------------------------------------------------------------------
    //Read
    public function staf_index(Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::all();
        return view('pages.users.staf.uraiankegiatan.index', compact(['uraiankegiatan']));
    }

    //Create
    public function staf_create(Request $request)
    {
        return view('pages.users.staf.uraiankegiatan.create');
    }

    public function staf_store(Request $request)
    {
        list_uraian_kegiatan::create($request->except(['_token','submit']));
        return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
    }

    //Update
    public function staf_edit($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        return view('pages.users.staf.uraiankegiatan.edit', compact(['uraiankegiatan']));
    }

    public function staf_update($id, Request $request)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->update($request->except(['_token','submit']));
        return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->delete();
        return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
    }

}
