<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\list_angka_kredit;
use Illuminate\Http\Request;

class ListAngkaKreditController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $angkakredit = list_angka_kredit::all();
        return view('pages.admin.listangkakredit.index', compact(['angkakredit']));
    }

    //Create
    public function create(Request $request) 
    {
        return view('pages.admin.listangkakredit.create');       
    }

    public function store(Request $request)
    {
        list_angka_kredit::create($request->except(['_token','submit']));
        return redirect('/masterangkakredit/listangkakredit');
    }

    //Update
    public function edit($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        return view('pages.admin.ckpr.edit', compact(['angkakredit']));
    }

    public function update($id, Request $request)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->update($request->except(['_token','submit']));
        return redirect('/masterangkakredit/listangkakredit');
    }

    //Destroy
    public function destroy($id)
    {
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->delete();
        return redirect('/masterangkakredit/listangkakredit');
    }
}
