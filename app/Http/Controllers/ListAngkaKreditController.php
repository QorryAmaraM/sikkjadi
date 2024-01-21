<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\list_angka_kredit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListAngkaKreditController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = list_angka_kredit::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.listangkakredit.index', compact(['angkakredit']));
                break;
            case '2':
                return view('pages.users.kepalabps.listangkakredit.index', compact(['angkakredit']));
                break;
            case '3':
                return view('pages.users.kepalabu.listangkakredit.index', compact(['angkakredit']));
                break;
            case '4':
                return view('pages.users.kf.listangkakredit.index', compact(['angkakredit']));
                break;
            case '5':
                return view('pages.users.staf.listangkakredit.index', compact(['angkakredit']));
                break;
        }
    }

    //Create
    public function create(Request $request) 
    {
        $userid = Auth::user()->role_id;
        switch ($userid) {
            case '1':
                return view('pages.admin.listangkakredit.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.listangkakredit.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.listangkakredit.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.listangkakredit.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.listangkakredit.create', compact(['user']));
                break;
        }       
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        list_angka_kredit::create($request->except(['_token','submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-masterangkakredit/listangkakredit');
                break;
            case '2':
                return redirect('/kepalabps-masterangkakredit/listangkakredit');
                break;
            case '3':
                return redirect('/kepalabu-masterangkakredit/listangkakredit');
                break;
            case '4':
                return redirect('/kf-masterangkakredit/listangkakredit');
                break;
            case '5':
                return redirect('/staf-masterangkakredit/listangkakredit');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = list_angka_kredit::find($id);
        switch ($userid) {
            case '1':
                return view('pages.admin.listangkakredit.edit', compact(['angkakredit', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.listangkakredit.edit', compact(['angkakredit', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.listangkakredit.edit', compact(['angkakredit', 'user']));
                break;
            case '4':
                return view('pages.users.kf.listangkakredit.edit', compact(['angkakredit', 'user']));
                break;
            case '5':
                return view('pages.users.staf.listangkakredit.edit', compact(['angkakredit', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->update($request->except(['_token','submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-masterangkakredit/listangkakredit');
                break;
            case '2':
                return redirect('/kepalabps-masterangkakredit/listangkakredit');
                break;
            case '3':
                return redirect('/kepalabu-masterangkakredit/listangkakredit');
                break;
            case '4':
                return redirect('/kf-masterangkakredit/listangkakredit');
                break;
            case '5':
                return redirect('/staf-masterangkakredit/listangkakredit');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = list_angka_kredit::find($id);
        $angkakredit->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-masterangkakredit/listangkakredit');
                break;
            case '2':
                return redirect('/kepalabps-masterangkakredit/listangkakredit');
                break;
            case '3':
                return redirect('/kepalabu-masterangkakredit/listangkakredit');
                break;
            case '4':
                return redirect('/kf-masterangkakredit/listangkakredit');
                break;
            case '5':
                return redirect('/staf-masterangkakredit/listangkakredit');
                break;
        }
    }

}
