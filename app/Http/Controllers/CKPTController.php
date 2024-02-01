<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ckpt;
use App\Models\user;
use App\Models\entri_angka_kredit;
use App\Models\list_uraian_kegiatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CKPTController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::all();
        $user = user::all();
        $result = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->get();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpt.index', compact(['user', 'ckpt', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpt.index', compact(['ckpt']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpt.index', compact(['ckpt']));
                break;
            case '4':
                return view('pages.users.kf.ckpt.index', compact(['ckpt']));
                break;
            case '5':
                return view('pages.users.staf.ckpt.index', compact(['ckpt']));
                break;
        }
    }

    //Create
    public function create(Request $request)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = entri_angka_kredit::all();
        $uraiankegiatan = list_uraian_kegiatan::all();
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpt.create', compact(['user', 'angkakredit', 'uraiankegiatan']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpt.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpt.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.ckpt.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.ckpt.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        ckpt::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpt');
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

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::find($id);
        $user = user::all();
        $angkakredit = entri_angka_kredit::all();
        $uraiankegiatan = list_uraian_kegiatan::all();
        $result = ckpt::join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->select('list_uraian_kegiatans.*', 'entri_angka_kredits.*', 'ckpts.*')
            ->where('ckpts.id', 'like', '%' . $id . '%')
            ->get();
        switch ($userid) {
            case '1':
                return view('pages.admin.ckpt.edit', compact(['ckpt', 'user', 'result', 'angkakredit', 'uraiankegiatan']));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpt.edit', compact(['ckpt', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpt.edit', compact(['ckpt', 'user']));
                break;
            case '4':
                return view('pages.users.kf.ckpt.edit', compact(['ckpt', 'user']));
                break;
            case '5':
                return view('pages.users.staf.ckpt.edit', compact(['ckpt', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::find($id);
        $ckpt->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpt');
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

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $ckpt = ckpt::find($id);
        $ckpt->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-ckp/ckpt');
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

    //Search
    public function search(Request $request)
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
                <a href="' . route('ckpt.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('ckpt.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }
}
