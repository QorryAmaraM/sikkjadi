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
        $userid = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        // dd($userid);
        $rencanakinerja = rencana_kinerja::paginate(5);
        $user = user::all();
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')
            ->join('users', 'users.id', '=', 'skp_tahunans.user_id')
            ->select('users.*','skp_tahunans.*', 'rencana_kinerjas.*')
            ->paginate(5);

        $resultrole = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')
            ->join('users', 'users.id', '=', 'skp_tahunans.user_id')
            ->select('users.*','skp_tahunans.*', 'rencana_kinerjas.*')
            ->where('user_id', $userid)
            ->paginate(5);

        // dd($resultrole);

        switch ($user_role) {
            case '1':
                return view('pages.admin.rencanakinerja.index', compact(['rencanakinerja', 'result', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.index', compact(['rencanakinerja', 'resultrole', 'user', 'userid']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.index', compact(['rencanakinerja', 'resultrole', 'user']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.index', compact(['rencanakinerja', 'resultrole', 'user']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.index', compact(['rencanakinerja', 'resultrole', 'user']));
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
                return view('pages.users.kepalabps.rencanakinerja.create_index', compact(['skptahunan', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.create_index', compact(['skptahunan', 'user']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.create_index', compact(['skptahunan', 'user']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.create_index', compact(['skptahunan', 'user']));
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
                return view('pages.users.kepalabps.rencanakinerja.create', compact(['user', 'skptahunan']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.create', compact(['user', 'skptahunan']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.create', compact(['user', 'skptahunan']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.create', compact(['user', 'skptahunan']));
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
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')
            ->where('rencana_kinerjas.id', 'like', '%' . $id . '%')->get();

        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.edit', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.edit', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.edit', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.edit', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.edit', compact(['rencanakinerja', 'user', 'result']));
                break;
        }
    }
    public function edit_kuantitas($id)
    {
        $userid = Auth::user()->role_id;
        $rencanakinerja = rencana_kinerja::find($id);
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')
            ->where('rencana_kinerjas.id', 'like', '%' . $id . '%')->get();

        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.edit_kuantitas', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.edit_kuantitas', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.edit_kuantitas', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.edit_kuantitas', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.edit_kuantitas', compact(['rencanakinerja', 'user', 'result']));
                break;
        }
    }
    public function edit_kualitas($id)
    {
        $userid = Auth::user()->role_id;
        $rencanakinerja = rencana_kinerja::find($id);
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')
            ->where('rencana_kinerjas.id', 'like', '%' . $id . '%')->get();

        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.edit_kualitas', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.edit_kualitas', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.edit_kualitas', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.edit_kualitas', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.edit_kualitas', compact(['rencanakinerja', 'user', 'result']));
                break;
        }
    }
    public function edit_waktu($id)
    {
        $userid = Auth::user()->role_id;
        $rencanakinerja = rencana_kinerja::find($id);
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')
            ->where('rencana_kinerjas.id', 'like', '%' . $id . '%')->get();

        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.rencanakinerja.edit_waktu', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.rencanakinerja.edit_waktu', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.rencanakinerja.edit_waktu', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '4':
                return view('pages.users.kf.rencanakinerja.edit_waktu', compact(['rencanakinerja', 'user', 'result']));
                break;
            case '5':
                return view('pages.users.staf.rencanakinerja.edit_waktu', compact(['rencanakinerja', 'user', 'result']));
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

    //Search
    public function search(Request $request)
    {
        $output = "";
        $searchTerm = $request->data;

        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*')
            ->where('skp_tahunans.user_id', 'like', '%' . $request->search . '%')
            ->where('skp_tahunans.tahun', 'like', '%' . $request->tahun . '%')
            ->where('skp_tahunans.periode', 'like', '%' . $request->periode . '%')
            ->where('skp_tahunans.wilayah', 'like', '%' . $request->wilayah . '%')
            ->where('skp_tahunans.unit_kerja', 'like', '%' . $request->unitkerja . '%')
            ->where(function ($query) use ($searchTerm) {
                $query->where('rencana_kinerjas.kinerja', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.rencana_kinerja_atasan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.rencana_kinerja', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kuantitas_iki', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kuantitas_target_min', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kuantitas_target_max', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kuantitas_satuan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kualitas_iki', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kualitas_target_min', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kualitas_target_max', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kualitas_satuan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.waktu_iki', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.waktu_target_min', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.waktu_target_max', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.waktu_satuan', 'like', '%' . $searchTerm . '%');
            })
            ->get();

        foreach ($result as $result) {
            $output .=
                '<tr> 
            
            <td rowspan="3" > ' . $result->kinerja . ' </td>
            <td rowspan="3" > ' . $result->rencana_kinerja_atasan . ' </td>
            <td rowspan="3" > ' . $result->rencana_kinerja . ' </td>
            <td > ' . 'Kuantitas' . ' </td>            
            <td > ' . $result->kuantitas_iki . ' </td>            
            <td > ' . $result->kuantitas_target_min . ' </td>            
            <td > ' . $result->kuantitas_target_max . ' </td>            
            <td > ' . $result->kuantitas_satuan . ' </td>
            
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('kuantitas.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' .  ' </td>

            <td rowspan="3"> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('rencanakinerja.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' .  ' </td>
                          
            </tr>' .

                '<tr> 
            <td > ' . 'Kualitas' . ' </td>            
            <td > ' . $result->kualitas_iki . ' </td>            
            <td > ' . $result->kualitas_target_min . ' </td>            
            <td > ' . $result->kualitas_target_max . ' </td>            
            <td > ' . $result->kualitas_satuan . ' </td>
            
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('kualitas.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' .  ' </td>
                          
            </tr>' .

                '<tr> 
            <td > ' . 'Kualitas' . ' </td>            
            <td > ' . $result->waktu_iki . ' </td>            
            <td > ' . $result->waktu_target_min . ' </td>            
            <td > ' . $result->waktu_target_max . ' </td>            
            <td > ' . $result->waktu_satuan . ' </td>
            
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('waktu.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' .  ' </td>
                          
            </tr>';
        }
        return response($output);
    }

    public function search_role(Request $request)
    {
        $userid = Auth::user()->id;
        $output = "";
        $searchTerm = $request->data;

        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*')
            ->where('user_id', $userid)
            ->where('skp_tahunans.tahun', 'like', '%' . $request->tahun . '%')
            ->where('skp_tahunans.periode', 'like', '%' . $request->periode . '%')
            ->where('skp_tahunans.wilayah', 'like', '%' . $request->wilayah . '%')
            ->where('skp_tahunans.unit_kerja', 'like', '%' . $request->unitkerja . '%')
            ->where(function ($query) use ($searchTerm) {
                $query->where('rencana_kinerjas.kinerja', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.rencana_kinerja_atasan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.rencana_kinerja', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kuantitas_iki', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kuantitas_target_min', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kuantitas_target_max', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kuantitas_satuan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kualitas_iki', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kualitas_target_min', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kualitas_target_max', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.kualitas_satuan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.waktu_iki', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.waktu_target_min', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.waktu_target_max', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rencana_kinerjas.waktu_satuan', 'like', '%' . $searchTerm . '%');
            })
            ->get();

            // dd($result);

        foreach ($result as $result) {
            $output .=
                '<tr> 
            
            <td rowspan="3" > ' . $result->kinerja . ' </td>
            <td rowspan="3" > ' . $result->rencana_kinerja_atasan . ' </td>
            <td rowspan="3" > ' . $result->rencana_kinerja . ' </td>
            <td > ' . 'Kuantitas' . ' </td>            
            <td > ' . $result->kuantitas_iki . ' </td>            
            <td > ' . $result->kuantitas_target_min . ' </td>            
            <td > ' . $result->kuantitas_target_max . ' </td>            
            <td > ' . $result->kuantitas_satuan . ' </td>
            
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('kuantitas.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' .  ' </td>

            <td rowspan="3"> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('rencanakinerja.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' .  ' </td>
                          
            </tr>' .

                '<tr> 
            <td > ' . 'Kualitas' . ' </td>            
            <td > ' . $result->kualitas_iki . ' </td>            
            <td > ' . $result->kualitas_target_min . ' </td>            
            <td > ' . $result->kualitas_target_max . ' </td>            
            <td > ' . $result->kualitas_satuan . ' </td>
            
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('kualitas.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' .  ' </td>
                          
            </tr>' .

                '<tr> 
            <td > ' . 'Kualitas' . ' </td>            
            <td > ' . $result->waktu_iki . ' </td>            
            <td > ' . $result->waktu_target_min . ' </td>            
            <td > ' . $result->waktu_target_max . ' </td>            
            <td > ' . $result->waktu_satuan . ' </td>
            
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('waktu.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' .  ' </td>
                          
            </tr>';
        }
        return response($output);
    }
}
