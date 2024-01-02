<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpr;
use Illuminate\Http\Request;

class CKPRController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $ckpr = ckpr::all();
        return view('pages.admin.ckpr.index', compact(['ckpr']));
    }

    //Create
    public function create(Request $request)
    {
        return view('pages.admin.ckpr.create');
    }

    public function store(Request $request)
    {
        ckpr::create($request->except(['_token','submit']));
        return redirect('/ckp/ckpr');
    }

    //Update
    public function edit($id)
    {
        $ckpr = ckpr::find($id);
        return view('pages.admin.ckpr.edit', compact(['ckpr']));
    }

    public function update($id, Request $request)
    {
        $ckpr = ckpr::find($id);
        $ckpr->update($request->except(['_token','submit']));
        return redirect('/ckp/ckpr');
    }

    //Destroy
    public function destroy($id)
    {
        $ckpr = ckpr::find($id);
        $ckpr->delete();
        return redirect('/ckp/ckpr');
    }
}
