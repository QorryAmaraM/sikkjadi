<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaian_ckpr;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PenilaianCKPRController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        $nilaickpr = penilaian_ckpr::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
        }
    }

    //Create
    public function create(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        penilaian_ckpr::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/penilaianckpr');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/penilaianckpr');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/penilaianckpr');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/penilaianckpr');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/penilaianckpr');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $nilaickpr = penilaian_ckpr::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.edit', compact(['nilaickpr', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.edit', compact(['nilaickpr', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.edit', compact(['nilaickpr', 'user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.edit', compact(['nilaickpr', 'user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.edit', compact(['nilaickpr', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $nilaickpr = penilaian_ckpr::find($id);
        $nilaickpr->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/penilaianckpr');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/penilaianckpr');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/penilaianckpr');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/penilaianckpr');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/penilaianckpr');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $nilaickpr = penilaian_ckpr::find($id);
        $nilaickpr->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/penilaianckpr');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/penilaianckpr');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/penilaianckpr');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/penilaianckpr');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/penilaianckpr');
                break;
        }
    }
}
