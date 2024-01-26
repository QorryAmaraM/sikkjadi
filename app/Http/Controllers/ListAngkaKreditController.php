<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\entri_angka_kredit;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListAngkaKreditController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = entri_angka_kredit::join('users', 'entri_angka_kredits.user_id', '=', 'users.id')->select('users.*','entri_angka_kredits.*')->get();

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

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = entri_angka_kredit::find($id);
        switch ($userid) {
            case '1':
                return view('pages.admin.listangkakredit.edit', compact(['angkakredit']));
                break;
            case '2':
                return view('pages.users.kepalabps.listangkakredit.edit', compact(['angkakredit']));
                break;
            case '3':
                return view('pages.users.kepalabu.listangkakredit.edit', compact(['angkakredit']));
                break;
            case '4':
                return view('pages.users.kf.listangkakredit.edit', compact(['angkakredit']));
                break;
            case '5':
                return view('pages.users.staf.listangkakredit.edit', compact(['angkakredit']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = entri_angka_kredit::find($id);
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
        $angkakredit = entri_angka_kredit::find($id);
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
