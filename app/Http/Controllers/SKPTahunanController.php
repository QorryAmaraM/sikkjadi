<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\skp_tahunan;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SKPTahunanController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $user = user::all();
        $skptahunan = skp_tahunan::paginate(5);

        $skptahunanrole = skp_tahunan::where('user_id', $userid)
            ->paginate(5);

        switch ($user_role) {
            case '1':
                return view('pages.admin.skptahunan.index', compact(['skptahunan', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.skptahunan.index', compact(['skptahunanrole', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.index', compact(['skptahunanrole', 'user']));
                break;
            case '4':
                return view('pages.users.kf.skptahunan.index', compact(['skptahunan', 'user']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.index', compact(['skptahunanrole', 'user']));
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
                return view('pages.admin.skptahunan.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.skptahunan.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.skptahunan.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        // dd($request->except(['_token', 'submit']));
        skp_tahunan::create($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/skptahunan');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/skptahunan');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/skptahunan');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/skptahunan');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/skptahunan');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $skptahunan = skp_tahunan::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
            case '4':
                return view('pages.users.kf.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
            case '5':
                return view('pages.users.staf.skptahunan.edit', compact(['skptahunan', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/skptahunan');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/skptahunan');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/skptahunan');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/skptahunan');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/skptahunan');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $skptahunan = skp_tahunan::find($id);
        $skptahunan->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-perencanaankerja/skptahunan');
                break;
            case '2':
                return redirect('/kepalabps-perencanaankerja/skptahunan');
                break;
            case '3':
                return redirect('/kepalabu-perencanaankerja/skptahunan');
                break;
            case '4':
                return redirect('/kf-perencanaankerja/skptahunan');
                break;
            case '5':
                return redirect('/staf-perencanaankerja/skptahunan');
                break;
        }
    }

    public function search(Request $request)
    {
        $output = "";
        $searchTerm = $request->search;
        $searchpasti = $request->searchpegawai;

        $search = user::join('skp_tahunans', 'users.id', '=', 'skp_tahunans.user_id')
            ->select('skp_tahunans.*', 'users.*')
            ->where(function ($query) use ($searchTerm) {
                $query->where('users.nama', 'like', '%' . $searchTerm . '%')
                    ->orWhere('skp_tahunans.tahun', 'like', '%' . $searchTerm . '%')
                    ->orWhere('skp_tahunans.periode', 'like', '%' . $searchTerm . '%')
                    ->orWhere('skp_tahunans.wilayah', 'like', '%' . $searchTerm . '%')
                    ->orWhere('skp_tahunans.unit_kerja', 'like', '%' . $searchTerm . '%')
                    ->orWhere('skp_tahunans.jabatan', 'like', '%' . $searchTerm . '%');
            })
            ->where('skp_tahunans.user_id', 'like', '%' . $searchpasti . '%')
            ->get();

        // dd($search);

        foreach ($search as $search) {
            $output .=
                '<tr> 
            
            <td> ' . $search->tahun . ' </td>
            <td> ' . $search->periode . ' </td>
            <td> ' . $search->wilayah . ' </td>
            <td> ' . $search->unit_kerja . ' </td>
            <td> ' . $search->jabatan . ' </td>

            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('spktahunan.edit', ['id' => $search->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('spktahunan.delete', ['id' => $search->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>        
            
            </tr>';
        }
        return response($output);
    }
}
