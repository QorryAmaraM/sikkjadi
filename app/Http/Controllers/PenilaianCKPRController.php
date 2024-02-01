<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\penilaian_ckpr;
use App\Models\user;
use App\Models\ckpr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PenilaianCKPRController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        $nilaickpr = penilaian_ckpr::all();
        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*')
            ->get();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.index', compact(['nilaickpr', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.index', compact(['nilaickpr', 'user']));
                break;
        }
    }

    //Create
    public function create_index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpr = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*')
            ->get();

        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.create_index', compact(['user', 'ckpr']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.create', compact(['user']));
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
                return view('pages.users.kepalabps.penilaianckpr.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.create', compact(['user']));
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

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $nilaickpr = penilaian_ckpr::find($id);
        $user = user::all();
        $result = ckpr::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckprs.*')
            ->where('ckprs.id', 'like', '%' . $id . '%')
            ->get();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianckpr.edit', compact(['nilaickpr', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianckpr.edit', compact(['nilaickpr', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianckpr.edit', compact(['nilaickpr', 'user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianckpr.edit', compact(['nilaickpr', 'user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianckpr.edit', compact(['nilaickpr', 'user']));
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
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*', 'penilaian_ckprs.*')
            ->where('ckpts.user_id', 'like', '%' . $request->search . '%')
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        foreach ($result as $result) {

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->tahun . " " . $result->bulan . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->target . ' </td>
            <td> ' . $result->realisasi . ' </td>
            <td> ' . $result->persen . ' </td>
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

    public function search_create(Request $request)
    {
        $output = "";
        $iterationNumber = 1;

        $result = ckpr::join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->select('entri_angka_kredits.*', 'list_uraian_kegiatans.*', 'ckpts.*', 'ckprs.*')
            ->where('ckpts.user_id', 'like', '%' . $request->search . '%')
            ->where('ckpts.tahun', 'like', '%' . $request->tahun . '%')
            ->where('ckpts.bulan', 'like', '%' . $request->bulan . '%')
            ->get();

        foreach ($result as $result) {
            $statusBadge = ($result->status == '0') ? '<span class="badge badge-success">Sudah Diverifikasi</span>' : '<span class="badge badge-danger">Belum Diverifikasi</span>';
            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
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
                <a href="' . route('penilaianckpr.create', ['id' => $result->id]) . '" type="button" class="btn add-button">+ Nilai</a>
                </button>' . ' </td>
                
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }
}
