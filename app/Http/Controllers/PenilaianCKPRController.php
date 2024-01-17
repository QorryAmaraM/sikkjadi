<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaian_ckpr;
use Illuminate\Http\Request;

class PenilaianCKPRController extends Controller
{
    //admin-------------------------------------------------------------------------------------------------
    //Read
    public function admin_index(Request $request)
    {
        $nilaickpr = penilaian_ckpr::all();
        return view('pages.admin.penilaianckpr.index', compact(['nilaickpr']));
    }

    //Create
    public function admin_create(Request $request)
    {
        return view('pages.admin.penilaianckpr.create');
    }

    public function admin_store(Request $request)
    {
        penilaian_ckpr::create($request->except(['_token','submit']));
        return redirect('/admin-ckp/penilaianckpr');
    }

   //Update
   public function admin_edit($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       return view('pages.admin.penilaianckpr.edit', compact(['nilaickpr']));
   }

   public function admin_update($id, Request $request)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->update($request->except(['_token','submit']));
       return redirect('/admin-ckp/penilaianckpr');
   }

   //Destroy
   public function admin_destroy($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->delete();
       return redirect('/admin-ckp/penilaianckpr');
   }

   //kepalabps-------------------------------------------------------------------------------------------------
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

   //kepalabu-------------------------------------------------------------------------------------------------
    //Read
    public function kepalabu_index(Request $request)
    {
        $nilaickpr = penilaian_ckpr::all();
        return view('pages.users.kepalabu.penilaianckpr.index', compact(['nilaickpr']));
    }

    //Create
    public function kepalabu_create(Request $request)
    {
        return view('pages.users.kepalabu.penilaianckpr.create');
    }

    public function kepalabu_store(Request $request)
    {
        penilaian_ckpr::create($request->except(['_token','submit']));
        return redirect('/kepalabu-ckp/penilaianckpr');
    }

   //Update
   public function kepalabu_edit($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       return view('pages.users.kepalabu.penilaianckpr.edit', compact(['nilaickpr']));
   }

   public function kepalabu_update($id, Request $request)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->update($request->except(['_token','submit']));
       return redirect('/kepalabu-ckp/penilaianckpr');
   }

   //Destroy
   public function kepalabu_destroy($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->delete();
       return redirect('/kepalabu-ckp/penilaianckpr');
   }

   //kf-------------------------------------------------------------------------------------------------
    //Read
    public function kf_index(Request $request)
    {
        $nilaickpr = penilaian_ckpr::all();
        return view('pages.users.kf.penilaianckpr.index', compact(['nilaickpr']));
    }

    //Create
    public function kf_create(Request $request)
    {
        return view('pages.users.kf.penilaianckpr.create');
    }

    public function kf_store(Request $request)
    {
        penilaian_ckpr::create($request->except(['_token','submit']));
        return redirect('/kf-ckp/penilaianckpr');
    }

   //Update
   public function kf_edit($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       return view('pages.users.kf.penilaianckpr.edit', compact(['nilaickpr']));
   }

   public function kf_update($id, Request $request)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->update($request->except(['_token','submit']));
       return redirect('/kf-ckp/penilaianckpr');
   }

   //Destroy
   public function kf_destroy($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->delete();
       return redirect('/kf-ckp/penilaianckpr');
   }

   //staf-------------------------------------------------------------------------------------------------
    //Read
    public function staf_index(Request $request)
    {
        $nilaickpr = penilaian_ckpr::all();
        return view('pages.users.staf.penilaianckpr.index', compact(['nilaickpr']));
    }

    //Create
    public function staf_create(Request $request)
    {
        return view('pages.users.staf.penilaianckpr.create');
    }

    public function staf_store(Request $request)
    {
        penilaian_ckpr::create($request->except(['_token','submit']));
        return redirect('/staf-ckp/penilaianckpr');
    }

   //Update
   public function staf_edit($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       return view('pages.users.staf.penilaianckpr.edit', compact(['nilaickpr']));
   }

   public function staf_update($id, Request $request)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->update($request->except(['_token','submit']));
       return redirect('/staf-ckp/penilaianckpr');
   }

   //Destroy
   public function staf_destroy($id)
   {
       $nilaickpr = penilaian_ckpr::find($id);
       $nilaickpr->delete();
       return redirect('/staf-ckp/penilaianckpr');
   }
}
