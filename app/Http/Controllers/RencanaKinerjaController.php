<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\rencana_kinerja;
use App\Models\skp_tahunan;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class REncanaKinerjaController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $rencanakinerja = rencana_kinerja::all();
        $user = user::all();
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*','rencana_kinerjas.*')->get();


        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.index', compact(['rencanakinerja', 'result', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.index', compact(['rencanakinerja', 'result', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.index', compact(['rencanakinerja', 'result', 'user']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.index', compact(['rencanakinerja', 'result', 'user']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.index', compact(['rencanakinerja', 'result', 'user']));
                break;
        }
    }

    //Create
    public function create_index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        $skptahunan = skp_tahunan::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.create_index', compact(['skptahunan', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.skptahunan.index', compact(['skptahunan', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.index', compact(['skptahunan', 'user']));
                break;
            case '4':
                return view('pages.users.kf.skptahunan.index', compact(['skptahunan', 'user']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.index', compact(['skptahunan', 'user']));
                break;
        }
    }

    public function create($id)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        $skptahunan = skp_tahunan::find($id);
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.create', compact(['user', 'skptahunan']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.create', compact(['user']));
                break;
        }
    }


    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        rencana_kinerja::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/rencanakinerja');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/rencanakinerja');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/rencanakinerja');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/rencanakinerja');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/rencanakinerja');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $rencanakinerja = rencana_kinerja::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.edit', compact(['rencanakinerja', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/rencanakinerja');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/rencanakinerja');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/rencanakinerja');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/rencanakinerja');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/rencanakinerja');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $rencanakinerja = rencana_kinerja::find($id);
        $rencanakinerja->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/rencanakinerja');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/rencanakinerja');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/rencanakinerja');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/rencanakinerja');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/rencanakinerja');
                break;
        }
    }


    public function search(Request $request)
    {
        $output = "";

        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')
        ->select('skp_tahunans.*','rencana_kinerjas.*')
        ->where('skp_tahunans.user_id', 'like', '%'.$request->search.'%')
        ->where('skp_tahunans.tahun', 'like', '%'.$request->tahun.'%')
        ->where('skp_tahunans.periode', 'like', '%'.$request->periode.'%')
        ->where('skp_tahunans.wilayah', 'like', '%'.$request->wilayah.'%')
        ->where('skp_tahunans.unit_kerja', 'like', '%'.$request->unitkerja.'%')           
        ->get();        

        foreach ($result as $result) {
            $output .=
                '<tr> 
            
            <td> ' . $result->jenis . ' </td>
            <td> ' . $result->rencana_kinerja_atasan . ' </td>
            <td> ' . $result->rencana_kinerja . ' </td>
            <td> ' . $result->aspek . ' </td>
            <td> ' . $result->iki . ' </td>
            <td> ' . $result->target_min . ' </td>
            <td> ' . $result->target_max . ' </td>
            <td> ' . $result->satuan . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('rencanakinerja.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' ."|". '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('rencanakinerja.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';
        }
        return response($output);
    }
}
