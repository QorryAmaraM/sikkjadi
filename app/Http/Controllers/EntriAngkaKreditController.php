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
        $entriangkakredit = entri_angka_kredit::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.entriangkakredit.index', compact(['entriangkakredit', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.entriangkakredit.index', compact(['entriangkakredit', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.entriangkakredit.index', compact(['entriangkakredit', 'user']));
                break;
            case '4':
                return view('pages.users.kf.entriangkakredit.index', compact(['entriangkakredit', 'user']));
                break;
            case '5':
                return view('pages.users.staf.entriangkakredit.index', compact(['entriangkakredit', 'user']));
                break;
        }
        return view('pages.users.kepalabps.entriangkakredit.index');
    }

    public function create(Request $request)
    {
        return view('pages.users.kepalabps.entriangkakredit.create');
    }

    public function edit(Request $request)
    {
        return view('pages.users.kepalabps.entriangkakredit.edit');
    }

    
}
