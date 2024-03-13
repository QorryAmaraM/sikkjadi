<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\monitoring_ckp;
use App\Models\user;
use App\Models\penilaian_ckpr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MonitoringCKPController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $monitoringckp = monitoring_ckp::all();
        $user = user::all();

        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
            ->select('users.*', 'ckpts.*', 'ckprs.*', 'monitoring_ckps.id as monitoring_ckps_id', 'monitoring_ckps.*', 'penilaian_ckprs.*')
            ->orderBy('ckpts.tahun', 'desc')
            ->orderByRaw("FIELD(ckpts.bulan, 'Desember', 'November', 'Oktober', 'September', 'Agustus', 'Juli', 'Juni', 'Mei', 'April', 'Maret', 'Februari', 'Januari')")
            ->paginate(5);
            
            // dd($result);

        $resultrole = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
            ->select('users.*', 'ckpts.*', 'ckprs.*', 'monitoring_ckps.*', 'penilaian_ckprs.*')
            ->where('ckpts.user_id', $userid)
            ->orderBy('ckpts.tahun', 'desc')
            ->orderByRaw("FIELD(ckpts.bulan, 'Desember', 'November', 'Oktober', 'September', 'Agustus', 'Juli', 'Juni', 'Mei', 'April', 'Maret', 'Februari', 'Januari')")
            ->paginate(5);

        // dd($result);


        switch ($user_role) {
            case '1':
                return view('pages.admin.monitoringckp.index', compact(['monitoringckp', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringckp.index', compact(['monitoringckp', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringckp.index', compact(['monitoringckp', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.monitoringckp.index', compact(['monitoringckp', 'user', 'resultrole']));
                break;
            case '5':
                return view('pages.users.staf.monitoringckp.index', compact(['monitoringckp', 'user', 'resultrole']));
                break;
        }
    }

    public function index_kepalabps($id)
    {
        $userid = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $user = user::all();
        $nilaickpr = penilaian_ckpr::all();

        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
            ->select('users.*', 'ckpts.*', 'ckprs.*', 'monitoring_ckps.id as monitoring_ckps_id', 'monitoring_ckps.*', 'penilaian_ckprs.*')
            ->orderBy('ckpts.tahun', 'desc')
            ->orderByRaw("FIELD(ckpts.bulan, 'Desember', 'November', 'Oktober', 'September', 'Agustus', 'Juli', 'Juni', 'Mei', 'April', 'Maret', 'Februari', 'Januari')")
            ->where('ckpts.id', $id)
            ->get();

            // dd($result);

        switch ($user_role) {
            case '2':
                return view('pages.users.kepalabps.monitoringckp.index_kepalabps', compact(['nilaickpr', 'user', 'result']));
                break;
        }
    }


    //Create
    public function create(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.monitoringckp.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringckp.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringckp.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.monitoringckp.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.monitoringckp.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        monitoring_ckp::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringckp');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringckp');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringckp');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringckp');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringckp');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $nilai_ckpr_id = $id;
        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
            ->select('ckpts.*', 'ckprs.*', 'monitoring_ckps.*', 'penilaian_ckprs.*')
            ->where('penilaian_ckprs.id', 'like', '%' . $id . '%')
            ->get();
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.monitoringckp.edit', compact(['nilai_ckpr_id', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringckp.edit', compact(['nilai_ckpr_id', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringckp.edit', compact(['nilai_ckpr_id', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.monitoringckp.edit', compact(['nilai_ckpr_id', 'user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.monitoringckp.edit', compact(['nilai_ckpr_id', 'user', 'result']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $monitoringckp = monitoring_ckp::where('penilaian_ckpr_id', $id)->first();
        $monitoringckp->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringckp');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringckp');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringckp');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringckp');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringckp');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $monitoringckp = monitoring_ckp::find($id);
        $monitoringckp->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringckp');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringckp');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringckp');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringckp');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringckp');
                break;
        }
    }

    //Search
    public function search(Request $request)
    {
        $output = "";
        $iterationNumber = 1;

        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
            ->select('users.*','ckpts.*', 'ckprs.*', 'monitoring_ckps.*', 'penilaian_ckprs.*')
            ->where('ckpts.user_id', 'like', '%' . $request->search . '%')
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

            // dd($result);

        foreach ($result as $result) {

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->nama . ' </td>
            <td> ' . $result->bulan . " " . $result->tahun . ' </td>
            <td> ' . $result->nilai . ' </td>
            <td> ' . $result->ckp_akhir . ' </td>
            <td> ' . $result->keterangan_kepala . ' </td>
           

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('monitoringckp.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('monitoringckp.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }

    public function search_role(Request $request)
    {
        $userid = Auth::user()->id;
        $output = "";
        $iterationNumber = 1;

        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
            ->select('users.*', 'ckpts.*', 'ckprs.*', 'monitoring_ckps.*', 'penilaian_ckprs.*')
            ->where('ckpts.user_id', $userid)
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

            

        foreach ($result as $result) {

            $output .=
                '<tr> 

            <td> ' . $result->nama . ' </td>
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->bulan . " " . $result->tahun . ' </td>
            <td> ' . $result->nilai . ' </td>
            <td> ' . $result->ckp_akhir . ' </td>
            <td> ' . $result->keterangan_kepala . ' </td> 
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }
}
