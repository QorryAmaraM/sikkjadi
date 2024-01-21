<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\rencana_kinerja;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class REncanaKinerjaController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $rencanakinerja = rencana_kinerja::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.index', compact(['rencanakinerja']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.index', compact(['rencanakinerja']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.index', compact(['rencanakinerja']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.index', compact(['rencanakinerja']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.index', compact(['rencanakinerja']));
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
                return view('pages.admin.rencanakinerja.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        rencana_kinerja::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/rencanakinerja');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/rencanakinerja');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/rencanakinerja');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/rencanakinerja');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/rencanakinerja');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->id;
        $rencanakinerja = rencana_kinerja::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->id;
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/rencanakinerja');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/rencanakinerja');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/rencanakinerja');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/rencanakinerja');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/rencanakinerja');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->id;
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/rencanakinerja');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/rencanakinerja');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/rencanakinerja');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/rencanakinerja');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/rencanakinerja');
                break;
        }
    }
}
