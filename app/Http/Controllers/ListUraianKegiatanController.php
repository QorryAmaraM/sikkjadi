<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\list_uraian_kegiatan;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListUraianKegiatanController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $uraiankegiatan = list_uraian_kegiatan::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.uraiankegiatan.index', compact(['uraiankegiatan']));
                break;
            case '2':
                return view('pages.users.kepalabps.uraiankegiatan.index', compact(['uraiankegiatan']));
                break;
            case '3':
                return view('pages.users.kepalabu.uraiankegiatan.index', compact(['uraiankegiatan']));
                break;
            case '4':
                return view('pages.users.kf.uraiankegiatan.index', compact(['uraiankegiatan']));
                break;
            case '5':
                return view('pages.users.staf.uraiankegiatan.index', compact(['uraiankegiatan']));
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
                return view('pages.admin.uraiankegiatan.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.uraiankegiatan.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.uraiankegiatan.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.uraiankegiatan.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.uraiankegiatan.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        list_uraian_kegiatan::create($request->except(['_token','submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
                break;
            case '2':
                return redirect('/kepalabps-masteruraiankegiatan/uraiankegiatan');
                break;
            case '3':
                return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
                break;
            case '4':
                return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
                break;
            case '5':
                return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->id;
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
            case '4':
                return view('pages.users.kf.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
            case '5':
                return view('pages.users.staf.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->id;
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->update($request->except(['_token','submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
                break;
            case '2':
                return redirect('/kepalabps-masteruraiankegiatan/uraiankegiatan');
                break;
            case '3':
                return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
                break;
            case '4':
                return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
                break;
            case '5':
                return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->id;
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
                break;
            case '2':
                return redirect('/kepalabps-masteruraiankegiatan/uraiankegiatan');
                break;
            case '3':
                return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
                break;
            case '4':
                return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
                break;
            case '5':
                return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
                break;
        }
    }

}
