<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\user;
use App\Models\entri_angka_kredit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EntriAngkaKreditController extends Controller
{
     public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.entriangkakredit.index', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.entriangkakredit.index', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.entriangkakredit.index', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.entriangkakredit.index', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.entriangkakredit.index', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        entri_angka_kredit::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-masterangkakredit/listangkakredit');
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
