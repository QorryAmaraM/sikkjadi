<?php

namespace App\Http\Controllers;

use App\Charts\grafikpenilaianckp;
use App\Charts\grafikpenilaianskp;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // DashboardController.php
    public function dashboard(grafikpenilaianckp $chartckp, grafikpenilaianskp $chartskp)
    {
        $chartckp = $chartckp->build();
        $chartskp = $chartskp->build();
        $user = user::all();
        $userid = Auth::user()->role_id;
        
        switch ($userid) {
            case '1':
                return view('pages.admin.dashboard.index', compact(['user', 'chartckp','chartskp']));
                break;
            case '2':
                return view('pages.users.kepalaBPS.dashboard.index', compact(['user', 'chartckp','chartskp']));
                break;
            case '3':
                return view('pages.users.kepalaBU.dashboard.index', compact(['user', 'chartckp','chartskp']));
                break;
            case '4':
                return view('pages.users.KF.dashboard.index', compact(['user', 'chartckp','chartskp']));
                break;
            case '5':
                return view('pages.users.staf.dashboard.index', compact(['user', 'chartckp','chartskp']));
                break;
        }
    }

    public function profil(Request $request)
    {   
        $user = Auth::user();
        $userid = Auth::user()->role_id;
        // dd($user);

        switch ($userid) {
            case '1':
                return view('pages.admin.profile', compact('user'));
                break;
            case '2':
                return view('pages.users.kepalaBPS.profile', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalaBU.profile', compact(['user']));
                break;
            case '4':
                return view('pages.users.KF.profile', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.profile', compact(['user']));
                break;
        }
    }
}
