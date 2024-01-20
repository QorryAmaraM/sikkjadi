<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\skp_tahunan;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SKPTahunanController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $skptahunan = skp_tahunan::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.skptahunan.index', compact(['skptahunan']));
                break;
            case '2':
                return view('pages.users.kepalabps.skptahunan.index', compact(['skptahunan']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.index', compact(['skptahunan']));
                break;
            case '4':
                return view('pages.users.kf.skptahunan.index', compact(['skptahunan']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.index', compact(['skptahunan']));
                break;
        }
    }

    //Create
    public function create(Request $request)
    {
        $userid = Auth::user()->id;
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.skptahunan.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.skptahunan.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.skptahunan.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        skp_tahunan::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/skptahunan');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/skptahunan');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/skptahunan');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/skptahunan');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/skptahunan');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->id;
        $skptahunan = skp_tahunan::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
            case '4':
                return view('pages.users.kf.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->id;
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/skptahunan');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/skptahunan');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/skptahunan');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/skptahunan');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/skptahunan');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->id;
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/skptahunan');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/skptahunan');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/skptahunan');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/skptahunan');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/skptahunan');
                break;
        }
    }
}
