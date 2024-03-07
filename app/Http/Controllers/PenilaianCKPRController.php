<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaian_ckpr;
use App\Models\user;
use App\Models\ckpr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenilaianCKPRController extends Controller
{
    //Read
    public function index(Request $request)
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
            ->select('users.*', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->paginate(5);

            // dd($result);

        $resultrole = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('users.*', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', $userid)
            ->paginate(5);

        $result_kepalabps = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('users.*', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', $userid)
            ->paginate(5);


        switch ($user_role) {
            case '1':
                return view('pages.admin.penilaianckpr.index', compact(['nilaickpr', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.index', compact(['nilaickpr', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.index', compact(['nilaickpr', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.index', compact(['nilaickpr', 'user', 'resultrole']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.index', compact(['nilaickpr', 'user', 'resultrole']));
                break;
        }
    }

    public function print(Request $request)
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $userid = Auth::user()->role_id;
        $pejabatNama = $request->input('pejabatnama');
        $pejabatId = $request->input('pejabatid');

        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('users.*', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->get();

        $resultrole = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('users.*', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', $user_id)
            ->get();

        // dd($result);

        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'result'));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'resultrole'));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'resultrole'));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'resultrole'));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'resultrole'));
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
            ->select('users.*', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*',  DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.id', $id)
            ->get();

            // dd($result);

        switch ($user_role) {
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.index_kepalabps', compact(['nilaickpr', 'user', 'result']));
                break;
        }
    }

    //Create
    public function create_index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpr = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('users.nama','entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'penilaian_ckprs.*', 'ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->get();

            // dd($ckpr);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.create_index', compact(['user', 'ckpr']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.create_index', compact(['user', 'ckpr']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.create_index', compact(['user', 'ckpr']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.create_index', compact(['user', 'ckpr']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.create_index', compact(['user', 'ckpr']));
                break;
        }
    }

    public function create($id)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*')
            ->where('ckprs.id', 'like', '%' . $id . '%')
            ->get();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.create', compact(['user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.create', compact(['user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.create', compact(['user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.create', compact(['user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.create', compact(['user', 'result']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        penilaian_ckpr::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/penilaianckpr');
                break;
            case '2':
                return redirect('/kepalabps-ckp/penilaianckpr');
                break;
            case '3':
                return redirect('/kepalabu-ckp/penilaianckpr');
                break;
            case '4':
                return redirect('/kf-ckp/penilaianckpr');
                break;
            case '5':
                return redirect('/staf-ckp/penilaianckpr');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $nilaickpr = penilaian_ckpr::find($id);
        $user = user::all();
        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*')
            ->where('penilaian_ckprs.id', 'like', '%' . $id . '%')
            ->get();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.edit', compact(['nilaickpr', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.edit', compact(['nilaickpr', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.edit', compact(['nilaickpr', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.edit', compact(['nilaickpr', 'user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.edit', compact(['nilaickpr', 'user', 'result']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $nilaickpr = penilaian_ckpr::find($id);
        $nilaickpr->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/penilaianckpr');
                break;
            case '2':
                return redirect('/kepalabps-ckp/penilaianckpr');
                break;
            case '3':
                return redirect('/kepalabu-ckp/penilaianckpr');
                break;
            case '4':
                return redirect('/kf-ckp/penilaianckpr');
                break;
            case '5':
                return redirect('/staf-ckp/penilaianckpr');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $nilaickpr = penilaian_ckpr::find($id);
        $nilaickpr->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/penilaianckpr');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/penilaianckpr');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/penilaianckpr');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/penilaianckpr');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/penilaianckpr');
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
            ->select('users.*','entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', 'like', '%' . $request->search . '%')
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        foreach ($result as $result) {

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->nama . ' </td>
            <td> ' . $result->bulan . " " . $result->tahun . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->realisasi . ' </td>
            <td> ' . $result->persen . ' % </td>
            <td> ' . $result->nilai . ' </td>
            <td> ' . $result->kode_butir . ' </td>
            <td> ' . $result->angka_kredit . ' </td>
            <td> ' . $result->kode . ' </td>
            <td> ' . $result->keterangan . ' </td>
            <td> ' . $result->keterangan_penilai . ' </td>
            <td> ' . $result->penilai . ' </td>
           

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('penilaianckpr.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('penilaianckpr.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
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
            ->select('users.*','entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', $userid)
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        foreach ($result as $result) {

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->nama . ' </td>
            <td> ' . $result->bulan . " " . $result->tahun . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->realisasi . ' </td>
            <td> ' . $result->persen . ' % </td>
            <td> ' . $result->nilai . ' </td>
            <td> ' . $result->kode_butir . ' </td>
            <td> ' . $result->angka_kredit . ' </td>
            <td> ' . $result->kode . ' </td>
            <td> ' . $result->keterangan . ' </td>
            <td> ' . $result->keterangan_penilai . ' </td>
            <td> ' . $result->penilai . ' </td>  
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }

    public function search_create(Request $request)
    {
        $output = "";
        $iterationNumber = 1;

        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'penilaian_ckprs.*', 'ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', 'like', '%' . $request->search . '%')
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        foreach ($result as $result) {
            $statusBadge = ($result->status == '1') ? '<span class="badge badge-success">Sudah Diverifikasi</span>' : '<span class="badge badge-danger">Belum Diverifikasi</span>';
            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->kode . ' </td>
            <td> ' . $result->bulan . " " . $result->tahun . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->target_rev . ' </td>
            <td> ' . $result->realisasi . ' </td>
            <td> ' . $result->persen . ' % </td>
            <td> ' . $result->nilai . ' </td>
            <td> ' . $result->keterangan . ' </td>
            <td> ' . $statusBadge . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('penilaianckpr.create', ['id' => $result->id]) . '" type="button" class="btn add-button">+ Nilai</a>
                </button>' . ' </td>
                
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }
}
