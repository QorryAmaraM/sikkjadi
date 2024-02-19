<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\list_angka_kredit;
use App\Models\list_uraian_kegiatan;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListUraianKegiatanController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $uraiankegiatan = list_uraian_kegiatan::paginate(5);

        $uraiankegiatanrole = list_uraian_kegiatan::where('user_id', $userid)
        ->paginate(5);
        
        switch ($userid) {
            case '1':
                return view('pages.admin.uraiankegiatan.index', compact(['uraiankegiatan']));
                break;
            case '2':
                return view('pages.users.kepalabps.uraiankegiatan.index', compact(['uraiankegiatanrole']));
                break;
            case '3':
                return view('pages.users.kepalabu.uraiankegiatan.index', compact(['uraiankegiatan']));
                break;
            case '4':
                return view('pages.users.kf.uraiankegiatan.index', compact(['uraiankegiatan']));
                break;
            case '5':
                return view('pages.users.staf.uraiankegiatan.index', compact(['uraiankegiatan']));
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
                return view('pages.admin.uraiankegiatan.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.uraiankegiatan.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.uraiankegiatan.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.uraiankegiatan.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.uraiankegiatan.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        list_uraian_kegiatan::create($request->except(['_token','submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
                break;
            case '2':
                return redirect('/kepalabps-masteruraiankegiatan/uraiankegiatan');
                break;
            case '3':
                return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
                break;
            case '4':
                return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
                break;
            case '5':
                return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
            case '4':
                return view('pages.users.kf.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
            case '5':
                return view('pages.users.staf.uraiankegiatan.edit', compact(['uraiankegiatan', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->update($request->except(['_token','submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
                break;
            case '2':
                return redirect('/kepalabps-masteruraiankegiatan/uraiankegiatan');
                break;
            case '3':
                return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
                break;
            case '4':
                return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
                break;
            case '5':
                return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $uraiankegiatan = list_uraian_kegiatan::find($id);
        $uraiankegiatan->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-masteruraiankegiatan/uraiankegiatan');
                break;
            case '2':
                return redirect('/kepalabps-masteruraiankegiatan/uraiankegiatan');
                break;
            case '3':
                return redirect('/kepalabu-masteruraiankegiatan/uraiankegiatan');
                break;
            case '4':
                return redirect('/kf-masteruraiankegiatan/uraiankegiatan');
                break;
            case '5':
                return redirect('/staf-masteruraiankegiatan/uraiankegiatan');
                break;
        }
    }

    //Search
    public function search(Request $request)
    {
        $output = "";
        $iterationNumber = 1;
        $searchTerm = $request->data;

        $result = list_uraian_kegiatan::join('users', 'list_uraian_kegiatans.user_id', '=', 'users.id')
            ->select('users.*', 'list_uraian_kegiatans.*')
            ->where(function ($query) use ($searchTerm) {
                $query->where('list_uraian_kegiatans.pembuat', 'like', '%' . $searchTerm . '%')
                    ->orWhere('list_uraian_kegiatans.fungsi', 'like', '%' . $searchTerm . '%')
                    ->orWhere('list_uraian_kegiatans.uraian_kegiatan', 'like', '%' . $searchTerm . '%');
            })
            ->get();

            // dd($result);

        foreach ($result as $result) {
            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->pembuat . ' </td>
            <td> ' . $result->fungsi . ' </td>
            <td> ' . $result->uraian_kegiatan . ' </td>
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('listuraiankredit.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('listuraiankredit.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }

}

