<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\user;
use App\Models\skp_tahunan;
use App\Models\penilaian_skp;
use App\Models\rencana_kinerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianSKPController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $user = user::all();
        $result = penilaian_skp::join('rencana_kinerjas', 'rencanakinerja_id', '=', 'rencana_kinerjas.id')
            ->join('skp_tahunans', 'skp_tahunan_id', '=', 'skp_tahunans.id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*', 'penilaian_skps.*')
            ->get();

        $jumlah_utama = $result->where('kinerja', 'utama')->count();
        $jumlah_tambahan = $result->where('kinerja', 'tambahan')->count();

        $sum_utama = $result->where('kinerja', 'utama')->sum('nilai_tertimbang');
        $sum_tambahan = $result->where('kinerja', 'tambahan')->sum('nilai_tertimbang');

        $nilai_kinerja_utama = $sum_utama / $jumlah_utama;
        $nilai_kinerja_tambahan = $sum_tambahan / $jumlah_tambahan;

        $nilai_skp = $nilai_kinerja_utama + $nilai_kinerja_tambahan;

        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.index', compact(['result', 'user', 'nilai_kinerja_utama', 'nilai_kinerja_tambahan', 'nilai_skp',]));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianskp.index', compact(['penilaianskp', 'result', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianskp.index', compact(['penilaianskp', 'result', 'user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianskp.index', compact(['penilaianskp', 'result', 'user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianskp.index', compact(['penilaianskp', 'result', 'user']));
                break;
        }
    }

    //Create
    public function create_index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')->get();


        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.create_index', compact(['result', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.skptahunan.index', compact(['result', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.index', compact(['result', 'user']));
                break;
            case '4':
                return view('pages.users.kf.skptahunan.index', compact(['result', 'user']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.index', compact(['result', 'user']));
                break;
        }
    }

    public function create_search(Request $request)
    {
        $output = "";

        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*')
            ->where('skp_tahunans.user_id', 'like', '%' . $request->search . '%')
            ->get();

        foreach ($result as $result) {
            $output .=
                '<tr> 
            
            <td> ' . $result->kinerja . ' </td>
            <td> ' . $result->rencana_kinerja_atasan . ' </td>
            <td> ' . $result->rencana_kinerja . ' </td>
            <td> ' . $result->aspek . ' </td>
            <td> ' . $result->iki . ' </td>
            <td> ' . $result->target_min . ' </td>
            <td> ' . $result->target_max . ' </td>
            <td> ' . $result->satuan . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('penilaianskp.create', ['id' => $result->id]) . '" type="button" class="btn add-button">+ Nilai</a>
                </button>' . ' </td>

            </tr>';
        }
        return response($output);
    }

    public function create($id)
    {
        $userid = Auth::user()->id;
        $user = user::all();
        $skp_tahunan = skp_tahunan::all();
        $rencanakinerja_id = $id;
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')->get();

        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.create', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianskp.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianskp.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianskp.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianskp.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        penilaian_skp::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/penilaianskp');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/penilaianskp');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/penilaianskp');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/penilaianskp');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/penilaianskp');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->id;
        $penilaianskp = penilaian_skp::find($id);
        $user = user::all();
        $result = rencana_kinerja::join('penilaian_skps', 'rencana_kinerjas.id', '=', 'penilaian_skps.rencanakinerja_id')
            ->join('skp_tahunans', 'rencana_kinerjas.skp_tahunan_id', '=', 'skp_tahunans.id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*', 'penilaian_skps.*')
            ->where('penilaian_skps.id', 'like', '%' . $id . '%')
            ->get();
        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.edit', compact(['penilaianskp', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianskp.edit', compact(['penilaianskp', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianskp.edit', compact(['penilaianskp', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.penilaianskp.edit', compact(['penilaianskp', 'user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.penilaianskp.edit', compact(['penilaianskp', 'user', 'result']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->id;
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/penilaianskp');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/penilaianskp');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/penilaianskp');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/penilaianskp');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/penilaianskp');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->id;
        $penilaianskp = penilaian_skp::find($id);
        $penilaianskp->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/penilaianskp');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/penilaianskp');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/penilaianskp');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/penilaianskp');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/penilaianskp');
                break;
        }
    }

    //Search
    public function search(Request $request)
    {
        $output = "";


        $result = penilaian_skp::join('rencana_kinerjas', 'rencanakinerja_id', '=', 'rencana_kinerjas.id')
            ->join('skp_tahunans', 'skp_tahunan_id', '=', 'skp_tahunans.id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*', 'penilaian_skps.*')
            ->where('skp_tahunans.user_id', 'like', '%' . $request->search . '%')
            ->where('skp_tahunans.unit_kerja', 'like', '%' . $request->unitkerja . '%')
            ->where('rencana_kinerjas.kinerja', 'like', '%' . $request->kinerja . '%')
            ->get();

        foreach ($result as $result) {
            $output .=
                '<tr> 
            
            <td> ' . $result->kinerja . ' </td>
            <td> ' . $result->rencana_kinerja_atasan . ' </td>
            <td> ' . $result->rencana_kinerja . ' </td>
            <td> ' . $result->aspek . ' </td>
            <td> ' . $result->iki . ' </td>
            <td> ' . $result->target_min . ' </td>
            <td> ' . $result->target_max . ' </td>
            <td> ' . $result->satuan . ' </td>
            <td> ' . $result->realisasi . ' </td>
            <td> ' . $result->kondisi . ' </td>
            <td> ' . $result->capaian_iki . ' </td>
            <td> ' . $result->kategori_capaian_iki . ' </td>
            <td> ' . $result->nilai_capaian_rencana . ' </td>
            <td> ' . $result->kategori_capaian_rencana . ' </td>
            <td> ' . $result->nilai_tertimbang . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('penilaianskp.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('penilaianskp.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';
        }
        return response($output);
    }
}
