<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaian_ckpr;
use App\Models\user;
use Illuminate\Http\Request;

class PenilaianCKPRController extends Controller
{
    //Read
    public function kepalabps_index(Request $request)
    {
        $nilaickpr = penilaian_ckpr::all();
        return view('pages.users.kepalabps.penilaianckpr.index', compact(['nilaickpr']));
    }

    //Create
    public function kepalabps_create(Request $request)
    {
        return view('pages.users.kepalabps.penilaianckpr.create');
    }

    public function kepalabps_store(Request $request)
    {
        penilaian_ckpr::create($request->except(['_token','submit']));
        return redirect('/kepalabps-ckp/penilaianckpr');
    }

   //Update
   public function kepalabps_edit($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       return view('pages.users.kepalabps.penilaianckpr.edit', compact(['nilaickpr']));
   }

   public function kepalabps_update($id, Request $request)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->update($request->except(['_token','submit']));
       return redirect('/kepalabps-ckp/penilaianckpr');
   }

   //Destroy
   public function kepalabps_destroy($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->delete();
       return redirect('/kepalabps-ckp/penilaianckpr');
   }

}
