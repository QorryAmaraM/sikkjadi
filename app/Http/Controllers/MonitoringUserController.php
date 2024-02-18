<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\user;
use App\Models\entri_angka_kredit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class MonitoringUserController extends Controller
{
    //Read 
    public function index(Request $request)
    {
        $userid = Auth::user()->role_id;
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.monitoringuser.index', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.index', compact(['monitoringpresensi']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.index', compact(['monitoringpresensi']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.index', compact(['monitoringpresensi']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.index', compact(['monitoringpresensi']));
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
                return view('pages.admin.monitoringuser.create', compact(['user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.create', compact(['user']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.create', compact(['user']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.create', compact(['user']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.create', compact(['user']));
                break;
        }
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->role_id;
        $userData = $request->except(['_token', 'submit']);
        $userData['password'] = bcrypt($request->input('password'));

        // dd($userData);

        user::create($userData);
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringuser');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringpre');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringpre');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringpre');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringpre');
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $monitoringuser = user::find($id);
        $user = user::all();
        switch ($userid) {
            case '1':
                return view('pages.admin.monitoringuser.edit', compact(['monitoringuser', 'user']));
                break;
            case '2':
                return view('pages.users.kepalabps.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '4':
                return view('pages.users.kf.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
            case '5':
                return view('pages.users.staf.monitoringpre.edit', compact(['monitoringpresensi', 'user']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $monitoringuser = user::find($id);

        $data = $request->except(['_token', 'submit']); 
        if ($data['password'] === null) {
            $data['password'] = $monitoringuser->password;
        } else {
            $data['password'] = bcrypt($request->input('password'));
        }
        $monitoringuser->update($data);
        switch ($userid) {
            case '1':
                return redirect('/admin-monitoring/monitoringuser');
                break;
            case '2':
                return redirect('/kepalabps-monitoring/monitoringpre');
                break;
            case '3':
                return redirect('/kepalabu-monitoring/monitoringpre');
                break;
            case '4':
                return redirect('/kf-monitoring/monitoringpre');
                break;
            case '5':
                return redirect('/staf-monitoring/monitoringpre');
                break;
        }
    }

     //Destroy
     public function destroy($id)
     {
         $userid = Auth::user()->role_id;
         $monitoringuser = user::find($id);
         $monitoringuser->delete();
         switch ($userid) {
             case '1':
                 return redirect('/admin-monitoring/monitoringuser');
                 break;
             case '2':
                 return redirect('/kepalabps-monitoring/monitoringpre');
                 break;
             case '3':
                 return redirect('/kepalabu-monitoring/monitoringpre');
                 break;
             case '4':
                 return redirect('/kf-monitoring/monitoringpre');
                 break;
             case '5':
                 return redirect('/staf-monitoring/monitoringpre');
                 break;
         }
     }

     //Search
    public function search(Request $request)
    {
        $output = "";
        $iterationNumber = 1;
        $searchTerm = $request->data;
        
        if ($request->data == 'admin') {
            $searchTerm = '1';
        } elseif ($request->data == 'kepala bps') {
            $searchTerm = '2';
        } elseif ($request->data == 'kepala bu') {
            $searchTerm = '3';
        } elseif ($request->data == 'koordinator fungsi') {
            $searchTerm = '4';
        } elseif ($request->data == 'staf') {
            $searchTerm = '5';
        }


        $result = user::where(function ($query) use ($searchTerm) {
                $query->where('users.nama', 'like', '%' . $searchTerm . '%')
                    ->orWhere('users.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('users.nip', 'like', '%' . $searchTerm . '%')
                    ->orWhere('users.golongan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('users.role_id', 'like', '%' . $searchTerm . '%');
            })->get();

            // dd($result);

        foreach ($result as $result) {

            if ($result->role_id == '1') {
                $jabatan = "Admin";
            } elseif ($result->role_id == '2') {
                $jabatan = "Kepala BPS";
            } elseif ($result->role_id == '3') {
                $jabatan = "Kepala BU";
            } elseif ($result->role_id == '4') {
                $jabatan = "Koordinator Fungsi";
            } elseif ($result->role_id == '5') {
                $jabatan = "Staf";
            }
           

            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->nama . ' </td>
            <td> ' . $result->email . ' </td>
            <td> ' . $result->nip . ' </td>
            <td> ' . $result->golongan . ' </td>
            <td> ' . $jabatan . ' </td>
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('monitoringuser.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('monitoringuser.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }
}
