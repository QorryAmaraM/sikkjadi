<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpt;
use Illuminate\Http\Request;

class CKPTController extends Controller
{
    //Read
    public function depan(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.admin.ckpt.depan', compact(['ckpt']));
    }
    
    public function index(Request $request)
    {
        $ckpt = ckpt::all();
        return view('pages.admin.ckpt.index', compact(['ckpt']));
    }


    //Cread
    public function create(Request $request)
    {
        return view('pages.admin.ckpt.create');
    }

    public function store(Request $request)
    {
        ckpt::create($request->except(['_token','submit']));
        return redirect('/ckp/ckpt');
    }

    //Update
    public function edit($id)
    {
        $ckpt = ckpt::find($id);
        return view('pages.admin.ckpt.edit', compact(['ckpt']));
    }

    public function update($id, Request $request)
    {
        $ckpt = ckpt::find($id);
        $ckpt->update($request->except(['_token','submit']));
        return redirect('/ckp/ckpt');
    }

    //Destroy
    public function destroy($id)
    {
        $ckpt = ckpt::find($id);
        $ckpt->delete();
        return redirect('/ckp/ckpt');
    }

    

    
}
