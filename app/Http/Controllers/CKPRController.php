<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpr;
use App\Models\ckpt;
use App\Models\user;
use App\Models\entri_angka_kredit;
use App\Models\list_uraian_kegiatan;
use App\Models\penilaian_ckpr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CKPRController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $ckpr = ckpr::all();
        $user = user::all();

        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->paginate(5);

        $resultrole = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', $userid)
            ->paginate(5);

        $result_kepalabu_query = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('users.nama','users.role_id', 'entri_angka_kredits.kode_butir', 'entri_angka_kredits.angka_kredit', 'list_uraian_kegiatans.fungsi', 'list_uraian_kegiatans.uraian_kegiatan', 'ckpts.*', 'ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->whereIn('users.role_id', [3, 4, 5]);

        $result_kepalabu_all =  $result_kepalabu_query->get();

        $result_kepalabu = $result_kepalabu_query->paginate(5);

        // dd($resultrole);

        switch ($user_role) {
            case '1':
                return view('pages.admin.ckpr.index', compact(['ckpr', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.index', compact(['ckpr', 'user', 'resultrole']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.index', compact(['userid', 'ckpr', 'user', 'result_kepalabu', 'result_kepalabu_all']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.index', compact(['ckpr', 'user', 'resultrole']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.index', compact(['ckpr', 'user', 'resultrole']));
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

        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'penilaian_ckprs.*', 'ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', $user_id)
            ->get();

        // dd($result);


        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'result'));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'result'));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'result'));
                break;
            case '4':
                return view('pages.users.kf.ckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'result'));
                break;
            case '5':
                return view('pages.users.staf.ckpr.print', compact('user', 'pejabatNama', 'pejabatId', 'result'));
                break;
        }
    }

    //Create
    public function create_index(Request $request)
    {
        $userid = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $ckpt = ckpt::all();
        $user = user::all();
        $result = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->get();

        $resultrole = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->where('ckpts.user_id', $userid)
            ->get();
        $user = user::all();

        // dd($resultrole);

        switch ($user_role) {
            case '1':
                return view('pages.admin.ckpr.create-index', compact(['user', 'ckpt', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.create-index', compact(['user', 'ckpt', 'resultrole']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.create-index', compact(['user', 'ckpt', 'resultrole']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.create-index', compact(['user', 'ckpt', 'resultrole']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.create-index', compact(['user', 'ckpt', 'resultrole']));
                break;
        }
    }

    public function create($id)
    {
        $userid = Auth::user()->role_id;
        $result = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->where('ckpts.id', 'like', '%' . $id . '%')
            ->get();
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.create', compact(['user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.create', compact(['user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.create', compact(['user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.create', compact(['user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.create', compact(['user', 'result']));
                break;
        }
    }

    public function create_search(Request $request)
    {
        $userid = Auth::user()->id;
        $output = "";
        $iterationNumber = 1;

        $result = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->where('ckpts.user_id', $userid)
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        // dd($result);

        foreach ($result as $result) {

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->fungsi . ' </td>
            <td> ' . $result->bulan . " " . $result->tahun . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->target_rev . ' </td>
            <td> ' . $result->kode_butir . ' </td>
            <td> ' . $result->angka_kredit . ' </td>
            <td> ' . $result->kode . ' </td>
            <td> ' . $result->keterangan . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('kuantitas.create', ['id' => $result->id]) . '" type="button" class="btn add-button">+ Realisasi</a>
                </button>' .  ' </td>

            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token', 'submit']));
        $userid = Auth::user()->role_id;
        ckpr::create($request->except(['_token', 'submit','status']));
        $ckpt = ckpt::find($request->ckpt_id);
        $ckpt->update($request->only('status'));

        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpr');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpr');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpr');
                break;
            case '4':
                return redirect('/kf-ckp/ckpr');
                break;
            case '5':
                return redirect('/staf-ckp/ckpr');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $ckpr = ckpr::find($id);
        $user = user::all();
        $angkakredit = entri_angka_kredit::all();
        $uraiankegiatan = list_uraian_kegiatan::all();
        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*')
            ->where('ckprs.id', 'like', '%' . $id . '%')
            ->get();

        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.edit', compact(['ckpr', 'user', 'result', 'angkakredit', 'uraiankegiatan']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.edit', compact(['ckpr', 'user', 'result', 'angkakredit', 'uraiankegiatan']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.edit', compact(['ckpr', 'user', 'result', 'angkakredit', 'uraiankegiatan']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.edit', compact(['ckpr', 'user', 'result', 'angkakredit', 'uraiankegiatan']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.edit', compact(['ckpr', 'user', 'result', 'angkakredit', 'uraiankegiatan']));
                break;
        }
    }

    public function edit_kepalabu($id)
    {
        $userid = Auth::user()->role_id;
        $ckpr = ckpr::find($id);
        $user = user::all();
        $angkakredit = entri_angka_kredit::all();
        $uraiankegiatan = list_uraian_kegiatan::all();
        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('users.nama', 'users.nip', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*')
            ->where('ckprs.id', 'like', '%' . $id . '%')
            ->get();

        // dd($result);

        switch ($userid) {
            case '3':
                return view('pages.users.kepalabu.ckpr.edit_2', compact(['ckpr', 'user', 'result', 'angkakredit', 'uraiankegiatan']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpr = ckpr::find($id);
        $ckpr->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpr');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpr');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpr');
                break;
            case '4':
                return redirect('/kf-ckp/ckpr');
                break;
            case '5':
                return redirect('/staf-ckp/ckpr');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $ckpr = ckpr::find($id);
        $ckpr->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpr');
                break;
            case '2':
                return redirect('/kepalabps-ckp/ckpr');
                break;
            case '3':
                return redirect('/kepalabu-ckp/ckpr');
                break;
            case '4':
                return redirect('/kf-ckp/ckpr');
                break;
            case '5':
                return redirect('/staf-ckp/ckpr');
                break;
        }
    }

    //Search
    public function search(Request $request)
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
            <td> ' . $result->fungsi . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . $result->kode_butir . ' </td>
            <td> ' . $result->angka_kredit . ' </td>
            <td> ' . $result->kode . ' </td>
            <td> ' . $result->periode . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->target_rev . ' </td>
            <td> ' . $result->realisasi . ' </td>
            <td> ' . $result->persen . ' % </td>
            <td> ' . $result->nilai . ' </td>
            <td> ' . $result->keterangan . ' </td>
            <td> ' . $statusBadge . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('ckpr.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('ckpr.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
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

        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'penilaian_ckprs.*', 'ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.user_id', $userid)
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        // dd($result);

        foreach ($result as $result) {
            $statusBadge = ($result->status == '1') ? '<span class="badge badge-success">Sudah Diverifikasi</span>' : '<span class="badge badge-danger">Belum Diverifikasi</span>';
            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->fungsi . ' </td>
            <td> ' . $result->bulan . " " . $result->tahun . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->target_rev . ' </td>
            <td> ' . $result->realisasi . ' </td>
            <td> ' . $result->persen . ' % </td>
            <td> ' . $result->nilai . ' </td>
            <td> ' . $result->kode_butir . ' </td>
            <td> ' . $result->angka_kredit . ' </td>
            <td> ' . $result->kode . ' </td>
            <td> ' . $result->keterangan . ' </td>
            <td> ' . $statusBadge . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('ckpr.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('ckpr.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }

    public function search_kepalabu(Request $request)
    {
        $userid = Auth::user()->id;
        $output = "";
        $iterationNumber = 1;

        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->whereIn('users.role_id', [3, 4, 5])
            ->where('users.nama', 'like', '%' . $request->search . '%')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('penilaian_ckprs', 'penilaian_ckprs.ckpr_id', '=', 'ckprs.id')
            ->select('users.nama', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'penilaian_ckprs.*', 'ckprs.*', DB::raw('CAST((realisasi / COALESCE(target_rev, target)) * 100 AS UNSIGNED) as persen'))
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        // dd($result);

        foreach ($result as $result) {
            $statusBadge = ($result->status == '1') ? '<span class="badge badge-success">Sudah Diverifikasi</span>' : '<span class="badge badge-danger">Belum Diverifikasi</span>';
            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->nama . ' </td>
            <td> ' . $result->fungsi . ' </td>
            <td> ' . $result->bulan . " " . $result->tahun . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->target_rev . ' </td>
            <td> ' . $result->realisasi . ' </td>
            <td> ' . $result->persen . ' % </td>
            <td> ' . $result->nilai . ' </td>
            <td> ' . $result->kode_butir . ' </td>
            <td> ' . $result->angka_kredit . ' </td>
            <td> ' . $result->kode . ' </td>
            <td> ' . $result->keterangan . ' </td>
            <td> ' . $statusBadge . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('ckpr.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('ckpr.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }
}
