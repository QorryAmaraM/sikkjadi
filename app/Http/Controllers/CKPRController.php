<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpr;
use App\Models\ckpt;
use App\Models\user;
use App\Models\entri_angka_kredit;
use App\Models\list_uraian_kegiatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CKPRController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpr = ckpr::all();
        $user = user::all();
        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select( 'entri_angka_kredits.*', 'list_uraian_kegiatans.*','ckpts.*', 'ckprs.*')
            ->get();

        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.index', compact(['ckpr', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.index', compact(['ckpr']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.index', compact(['ckpr']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.index', compact(['ckpr']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.index', compact(['ckpr']));
                break;
        }
    }

    //Create
    public function create_index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::all();
        $user = user::all();
        $result = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->get();
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.create-index', compact(['user', 'ckpt', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.create', compact(['user']));
                break;
        }
    }

    public function create($id)
    {
        $userid = Auth::user()->role_id;
        $result = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->where('ckpts.id', 'like', '%'.$id.'%')
            ->get();
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.create', compact(['user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.create', compact(['user']));
                break;
        }
    }

    public function create_search(Request $request)
    {
        $output = "";
        $iterationNumber = 1;

        $result = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->where('ckpts.user_id', 'like', '%' . $request->search . '%')
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        foreach ($result as $result) {

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->fungsi . ' </td>
            <td> ' . $result->tahun . " " . $result->bulan . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->target_rev . ' </td>
            <td> ' . $result->kode_butir . ' </td>
            <td> ' . $result->angka_kredit . ' </td>
            <td> ' . $result->kode . ' </td>
            <td> ' . $result->keterangan . ' </td>
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('ckpr.create', ['id' => $result->id]) . '" type="button" class="btn add-button">+ Realisasi</a>
                </button>' . ' </td> 
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        ckpr::create($request->except(['_token', 'submit']));
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
        $result = ckpr::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckprs.*')
            ->where('ckprs.id', 'like', '%' . $id . '%')
            ->get();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpr.edit', compact(['ckpr', 'user', 'result', 'angkakredit', 'uraiankegiatan']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpr.edit', compact(['ckpr', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpr.edit', compact(['ckpr', 'user']));
                break;
            case '4':
                return view('pages.users.kf.ckpr.edit', compact(['ckpr', 'user']));
                break;
            case '5':
                return view('pages.users.staf.ckpr.edit', compact(['ckpr', 'user']));
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
            ->select('ckpts.*', 'entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckprs.*')
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
            <td> ' . $result->persen . ' </td>
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
}
