<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpr;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CKPRController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $ckpr = ckpr::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.index', compact(['ckpr']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.index', compact(['ckpr']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.index', compact(['ckpr']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.index', compact(['ckpr']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.index', compact(['ckpr']));
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
                return view('pages.admin.ckpr.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        ckpr::create($request->except(['_token','submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpr');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpr');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpr');
                break;
            case '4':
                return redirect('/kf-ckp/ckpr');
                break;
            case '5':
                return redirect('/staf-ckp/ckpr');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->id;
        $ckpr = ckpr::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.edit', compact(['ckpr', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.edit', compact(['ckpr', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.edit', compact(['ckpr', 'user']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.edit', compact(['ckpr', 'user']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.edit', compact(['ckpr', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->id;
        $ckpr = ckpr::find($id);
        $ckpr->update($request->except(['_token','submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpr');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpr');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpr');
                break;
            case '4':
                return redirect('/kf-ckp/ckpr');
                break;
            case '5':
                return redirect('/staf-ckp/ckpr');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->id;
        $ckpr = ckpr::find($id);
        $ckpr->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpr');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpr');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpr');
                break;
            case '4':
                return redirect('/kf-ckp/ckpr');
                break;
            case '5':
                return redirect('/staf-ckp/ckpr');
                break;
        }
    }
}
