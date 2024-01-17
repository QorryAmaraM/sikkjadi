<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\list_angka_kredit;
use Illuminate\Http\Request;

class ListAngkaKreditController extends Controller
{
    //Admin-----------------------------------------------------------------------------------------------
    //Read
    public function admin_index(Request $request)
    {
        $angkakredit = list_angka_kredit::all();
        return view('pages.admin.listangkakredit.index', compact(['angkakredit']));
    }

    //Create
    public function admin_create(Request $request) 
    {
        return view('pages.admin.listangkakredit.create');       
    }

    public function admin_store(Request $request)
    {
        list_angka_kredit::create($request->except(['_token','submit']));
        return redirect('/admin-masterangkakredit/listangkakredit');
    }

    //Update
    public function admin_edit($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        return view('pages.admin.ckpr.edit', compact(['angkakredit']));
    }

    public function admin_update($id, Request $request)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->update($request->except(['_token','submit']));
        return redirect('/admin-masterangkakredit/listangkakredit');
    }

    //Destroy
    public function admin_destroy($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->delete();
        return redirect('/admin-masterangkakredit/listangkakredit');
    }

    //Kepala BPS-----------------------------------------------------------------------------------------------
    //Read
    public function kepalabps_index(Request $request)
    {
        $angkakredit = list_angka_kredit::all();
        return view('pages.users.kepalabps.listangkakredit.index', compact(['angkakredit']));
    }

    //Create
    public function kepalabps_create(Request $request) 
    {
        return view('pages.users.kepalabps.listangkakredit.create');       
    }

    public function kepalabps_store(Request $request)
    {
        list_angka_kredit::create($request->except(['_token','submit']));
        return redirect('/kepalabps-masterangkakredit/listangkakredit');
    }

    //Update
    public function kepalabps_edit($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        return view('pages.users.kepalabps.ckpr.edit', compact(['angkakredit']));
    }

    public function kepalabps_update($id, Request $request)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->update($request->except(['_token','submit']));
        return redirect('/kepalabps-masterangkakredit/listangkakredit');
    }

    //Destroy
    public function kepalabps_destroy($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->delete();
        return redirect('/kepalabps-masterangkakredit/listangkakredit');
    }

    //Kepala BU-----------------------------------------------------------------------------------------------
    //Read
    public function kepalabu_index(Request $request)
    {
        $angkakredit = list_angka_kredit::all();
        return view('pages.users.kepalabu.listangkakredit.index', compact(['angkakredit']));
    }

    //Create
    public function kepalabu_create(Request $request) 
    {
        return view('pages.users.kepalabu.listangkakredit.create');       
    }

    public function kepalabu_store(Request $request)
    {
        list_angka_kredit::create($request->except(['_token','submit']));
        return redirect('/kepalabu-masterangkakredit/listangkakredit');
    }

    //Update
    public function kepalabu_edit($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        return view('pages.users.kepalabu.ckpr.edit', compact(['angkakredit']));
    }

    public function kepalabu_update($id, Request $request)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->update($request->except(['_token','submit']));
        return redirect('/kepalabu-masterangkakredit/listangkakredit');
    }

    //Destroy
    public function kepalabu_destroy($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->delete();
        return redirect('/kepalabu-masterangkakredit/listangkakredit');
    }

    //KF-----------------------------------------------------------------------------------------------
    //Read
    public function kf_index(Request $request)
    {
        $angkakredit = list_angka_kredit::all();
        return view('pages.users.kf.listangkakredit.index', compact(['angkakredit']));
    }

    //Create
    public function kf_create(Request $request) 
    {
        return view('pages.users.kf.listangkakredit.create');       
    }

    public function kf_store(Request $request)
    {
        list_angka_kredit::create($request->except(['_token','submit']));
        return redirect('/kf-masterangkakredit/listangkakredit');
    }

    //Update
    public function kf_edit($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        return view('pages.users.kf.ckpr.edit', compact(['angkakredit']));
    }

    public function kf_update($id, Request $request)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->update($request->except(['_token','submit']));
        return redirect('/kf-masterangkakredit/listangkakredit');
    }

    //Destroy
    public function kf_destroy($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->delete();
        return redirect('/kf-masterangkakredit/listangkakredit');
    }

    //Staf-----------------------------------------------------------------------------------------------
    //Read
    public function staf_index(Request $request)
    {
        $angkakredit = list_angka_kredit::all();
        return view('pages.users.staf.listangkakredit.index', compact(['angkakredit']));
    }

    //Create
    public function staf_create(Request $request) 
    {
        return view('pages.users.staf.listangkakredit.create');       
    }

    public function staf_store(Request $request)
    {
        list_angka_kredit::create($request->except(['_token','submit']));
        return redirect('/staf-masterangkakredit/listangkakredit');
    }

    //Update
    public function staf_edit($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        return view('pages.users.staf.ckpr.edit', compact(['angkakredit']));
    }

    public function staf_update($id, Request $request)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->update($request->except(['_token','submit']));
        return redirect('/staf-masterangkakredit/listangkakredit');
    }

    //Destroy
    public function staf_destroy($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->delete();
        return redirect('/staf-masterangkakredit/listangkakredit');
    }
}
