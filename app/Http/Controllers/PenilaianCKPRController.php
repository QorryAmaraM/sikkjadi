<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaian_ckpr;
use Illuminate\Http\Request;

class PenilaianCKPRController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $nilaickpr = penilaian_ckpr::all();
        return view('pages.admin.penilaianckpr.index', compact(['nilaickpr']));
    }

    //Create
    public function create(Request $request)
    {
        return view('pages.admin.penilaianckpr.create');
    }

    public function store(Request $request)
    {
        penilaian_ckpr::create($request->except(['_token','submit']));
        return redirect('/ckp/penilaianckpr');
    }

   //Update
   public function edit($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       return view('pages.admin.penilaianckpr.edit', compact(['nilaickpr']));
   }

   public function update($id, Request $request)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->update($request->except(['_token','submit']));
       return redirect('/ckp/penilaianckpr');
   }

   //Destroy
   public function destroy($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->delete();
       return redirect('/ckp/penilaianckpr');
   }
}
