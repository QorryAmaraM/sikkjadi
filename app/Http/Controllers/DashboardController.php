<?php

namespace App\Http\Controllers;

use App\Charts\grafikpenilaianckp;
use App\Charts\grafikpenilaianskp;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\penilaian_ckpr;
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

        $user_nilai_skp_terendah = User::orderBy('nilai_skp', 'asc')->first();
        $user_nilai_skp_tertinggi = User::orderBy('nilai_skp', 'desc')->first();

        $nilai_skp_terendah = $user_nilai_skp_terendah->nilai_skp;
        $user_id_terendah = $user_nilai_skp_terendah->nama;

        $nilai_skp_tertinggi = $user_nilai_skp_tertinggi->nilai_skp;
        $user_id_tertinggi = $user_nilai_skp_tertinggi->nama;

        // dd($user_id_terendah);

        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
            ->select('role_id', 'ckp_akhir')
            ->get();

        $nilai_ckp_terendah = $result->min('ckp_akhir');
        $nilai_ckp_tertinggi = $result->max('ckp_akhir');

        switch ($userid) {
            case '1':
                return view('pages.admin.dashboard.index', compact(['user', 'chartckp', 'chartskp']));
                break;
            case '2':
                return view('pages.users.kepalaBPS.dashboard.index', compact(['user', 'chartckp', 'chartskp', 'nilai_skp_tertinggi', 'nilai_skp_terendah', 'nilai_ckp_tertinggi', 'nilai_ckp_terendah', 'user_id_terendah', 'user_id_tertinggi']));
                break;
            case '3':
                return view('pages.users.kepalaBU.dashboard.index', compact(['user', 'chartckp', 'chartskp']));
                break;
            case '4':
                return view('pages.users.KF.dashboard.index', compact(['user', 'chartckp', 'chartskp']));
                break;
            case '5':
                return view('pages.users.staf.dashboard.index', compact(['user', 'chartckp', 'chartskp']));
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
