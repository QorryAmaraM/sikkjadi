<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\monitoring_presensi;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MonitoringPresensiController extends Controller
{
    //Read 
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $monitoringpresensi = monitoring_presensi::orderBy('monitoring_presensis.tahun', 'desc')
        ->orderByRaw("FIELD(monitoring_presensis.bulan, 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')")
        ->paginate(5);

        $monitoringpresensirole = monitoring_presensi::where('monitoring_presensis.user_id', $userid)
            ->orderBy('monitoring_presensis.tahun', 'desc')
            ->orderByRaw("FIELD(monitoring_presensis.bulan, 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')")
            ->paginate(5);

        // dd($monitoringpresensirole);

        // dd($monitoringpresensirole);

        $user = user::all();
        switch ($user_role) {
            case '1':
                return view('pages.admin.monitoringpre.index', compact(['monitoringpresensi', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.index', compact(['monitoringpresensirole', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.index', compact(['monitoringpresensi', 'user']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.index', compact(['monitoringpresensirole', 'user']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.index', compact(['monitoringpresensirole', 'user']));
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
                return view('pages.admin.monitoringpre.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.create', compact(['user']));
                break;
        }
    }


    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        monitoring_presensi::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringpre');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringpre');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringpre');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringpre');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringpre');
                break;
        }
    }

    //Update    
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $monitoringpresensi = monitoring_presensi::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringpre');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringpre');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringpre');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringpre');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringpre');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $monitoringpresensi = monitoring_presensi::find($id);
        $monitoringpresensi->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringpre');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringpre');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringpre');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringpre');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringpre');
                break;
        }
    }

    //Search
    public function search(Request $request)
    {
        $output = "";
        $iterationNumber = 1;

        $result = monitoring_presensi::where('monitoring_presensis.user_id', 'like', '%' . $request->search . '%')
            ->where('monitoring_presensis.tahun', 'like', '%' . $request->tahun . '%')
            ->where('monitoring_presensis.bulan', 'like', '%' . $request->bulan . '%')
            ->orderBy('monitoring_presensis.tahun', 'desc')
            ->orderByRaw("FIELD(monitoring_presensis.bulan, 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')")
            ->get();


        // dd($result);

        foreach ($result as $result) {

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->tahun . ' ' . $result->bulan . ' </td>
            <td> ' . $result->cp . ' </td>
            <td> ' . $result->ct . ' </td>
            <td> ' . $result->cb . ' </td>
            <td> ' . $result->cs . ' </td>
            <td> ' . $result->cm . ' </td>
            <td> ' . $result->ctln . ' </td>
            <td> ' . $result->s . ' </td>
            <td> ' . $result->psw1 . ' </td>
            <td> ' . $result->psw2 . ' </td>
            <td> ' . $result->psw3 . ' </td>
            <td> ' . $result->psw4 . ' </td>
            <td> ' . $result->tl1 . ' </td>
            <td> ' . $result->tl2 . ' </td>
            <td> ' . $result->tl3 . ' </td>
            <td> ' . $result->tl4 . ' </td>
            <td> ' . $result->jhk . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('monitoringpresensi.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('monitoringpresensi.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
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

        $result = monitoring_presensi::where('user_id', $userid)
            ->where('monitoring_presensis.user_id', 'like', '%' . $request->search . '%')
            ->where('monitoring_presensis.tahun', 'like', '%' . $request->tahun . '%')
            ->where('monitoring_presensis.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        foreach ($result as $result) {

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->tahun . ' ' . $result->bulan . ' </td>
            <td> ' . $result->cp . ' </td>
            <td> ' . $result->ct . ' </td>
            <td> ' . $result->cb . ' </td>
            <td> ' . $result->cs . ' </td>
            <td> ' . $result->cm . ' </td>
            <td> ' . $result->ctln . ' </td>
            <td> ' . $result->s . ' </td>
            <td> ' . $result->psw1 . ' </td>
            <td> ' . $result->psw2 . ' </td>
            <td> ' . $result->psw3 . ' </td>
            <td> ' . $result->psw4 . ' </td>
            <td> ' . $result->tl1 . ' </td>
            <td> ' . $result->tl2 . ' </td>
            <td> ' . $result->tl3 . ' </td>
            <td> ' . $result->tl4 . ' </td>
            <td> ' . $result->jhk . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('monitoringpresensi.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('monitoringpresensi.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }
}
