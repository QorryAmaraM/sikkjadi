<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpt;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CKPTController extends Controller
{
    //Read
    public function depan(Request $request)
    {
        $ckpt = ckpt::all();
        $userid = Auth::user()->role_id;
        return view('pages.users.kepalabps.ckpt.depan', compact(['ckpt']));
    }

    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpt.index', compact(['ckpt']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpt.index', compact(['ckpt']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpt.index', compact(['ckpt']));
                break;
            case '4':
                return view('pages.users.kf.ckpt.index', compact(['ckpt']));
                break;
            case '5':
                return view('pages.users.staf.ckpt.index', compact(['ckpt']));
                break;
        }
    }

    //Cread
    public function create(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpt.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpt.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpt.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.ckpt.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.ckpt.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        ckpt::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpt');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpt');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpt');
                break;
            case '4':
                return redirect('/kf-ckp/ckpt');
                break;
            case '5':
                return redirect('/staf-ckp/ckpt');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpt.edit', compact(['ckpt', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpt.edit', compact(['ckpt', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpt.edit', compact(['ckpt', 'user']));
                break;
            case '4':
                return view('pages.users.kf.ckpt.edit', compact(['ckpt', 'user']));
                break;
            case '5':
                return view('pages.users.staf.ckpt.edit', compact(['ckpt', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::find($id);
        $ckpt->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpt');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpt');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpt');
                break;
            case '4':
                return redirect('/kf-ckp/ckpt');
                break;
            case '5':
                return redirect('/staf-ckp/ckpt');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::find($id);
        $ckpt->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpt');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpt');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpt');
                break;
            case '4':
                return redirect('/kf-ckp/ckpt');
                break;
            case '5':
                return redirect('/staf-ckp/ckpt');
                break;
        }
    }
}
