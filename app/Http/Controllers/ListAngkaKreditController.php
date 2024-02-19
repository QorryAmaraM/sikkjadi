<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\entri_angka_kredit;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListAngkaKreditController extends Controller
{
    //Read
    public function index(Request $request)
    {
        $userid = Auth::user()->id;

        $angkakredit = entri_angka_kredit::join('users', 'entri_angka_kredits.user_id', '=', 'users.id')
        ->select('users.*', 'entri_angka_kredits.*')
        ->where('users.role_id', $userid)
        ->paginate(5);
        
        // dd($angkakredit);

        switch ($userid) {
            case '1':
                return view('pages.admin.listangkakredit.index', compact(['angkakredit']));
                break;
            case '2':
                return view('pages.users.kepalabps.listangkakredit.index', compact(['angkakredit', 'userid']));
                break;
            case '3':
                return view('pages.users.kepalabu.listangkakredit.index', compact(['angkakredit']));
                break;
            case '4':
                return view('pages.users.kf.listangkakredit.index', compact(['angkakredit']));
                break;
            case '5':
                return view('pages.users.staf.listangkakredit.index', compact(['angkakredit']));
                break;
        }
    }

    //Update
    public function edit($id)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = entri_angka_kredit::find($id);
        switch ($userid) {
            case '1':
                return view('pages.admin.listangkakredit.edit', compact(['angkakredit']));
                break;
            case '2':
                return view('pages.users.kepalabps.listangkakredit.edit', compact(['angkakredit']));
                break;
            case '3':
                return view('pages.users.kepalabu.listangkakredit.edit', compact(['angkakredit']));
                break;
            case '4':
                return view('pages.users.kf.listangkakredit.edit', compact(['angkakredit']));
                break;
            case '5':
                return view('pages.users.staf.listangkakredit.edit', compact(['angkakredit']));
                break;
        }
    }

    public function update($id, Request $request)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = entri_angka_kredit::find($id);
        $angkakredit->update($request->except(['_token', 'submit']));
        switch ($userid) {
            case '1':
                return redirect('/admin-masterangkakredit/listangkakredit');
                break;
            case '2':
                return redirect('/kepalabps-masterangkakredit/listangkakredit');
                break;
            case '3':
                return redirect('/kepalabu-masterangkakredit/listangkakredit');
                break;
            case '4':
                return redirect('/kf-masterangkakredit/listangkakredit');
                break;
            case '5':
                return redirect('/staf-masterangkakredit/listangkakredit');
                break;
        }
    }

    //Destroy
    public function destroy($id)
    {
        $userid = Auth::user()->role_id;
        $angkakredit = entri_angka_kredit::find($id);
        $angkakredit->delete();
        switch ($userid) {
            case '1':
                return redirect('/admin-masterangkakredit/listangkakredit');
                break;
            case '2':
                return redirect('/kepalabps-masterangkakredit/listangkakredit');
                break;
            case '3':
                return redirect('/kepalabu-masterangkakredit/listangkakredit');
                break;
            case '4':
                return redirect('/kf-masterangkakredit/listangkakredit');
                break;
            case '5':
                return redirect('/staf-masterangkakredit/listangkakredit');
                break;
        }
    }

    //Search
    public function search(Request $request)
    {
        $output = "";
        $iterationNumber = 1;
        $searchTerm = $request->data;

        $result = entri_angka_kredit::join('users', 'entri_angka_kredits.user_id', '=', 'users.id')
            ->select('users.*', 'entri_angka_kredits.*')
            ->where(function ($query) use ($searchTerm) {
                $query->where('entri_angka_kredits.jenis_fungsional', 'like', '%' . $searchTerm . '%')
                    ->orWhere('entri_angka_kredits.kode_butir', 'like', '%' . $searchTerm . '%')
                    ->orWhere('entri_angka_kredits.isi_butir', 'like', '%' . $searchTerm . '%')
                    ->orWhere('users.nama', 'like', '%' . $searchTerm . '%')
                    ->orWhere('entri_angka_kredits.angka_kredit', 'like', '%' . $searchTerm . '%');
            })
            ->get();

        foreach ($result as $result) {
            $output .=
                '<tr> 
            
            <td> ' . $iterationNumber . ' </td>
            <td> ' . $result->jenis_fungsional . ' </td>
            <td> ' . $result->nama . ' </td>
            <td> ' . $result->kode_butir . ' </td>
            <td> ' . $result->isi_butir . ' </td>
            <td> ' . $result->angka_kredit . ' </td>
            <td> ' . '<button class="btn btn-icon btn-edit btn-sm">
                <a href="' . route('listangkakredit.edit', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-edit"></i></a>
                </button>' . "|" . '<button class="btn btn-icon btn-delete btn-sm">
                <a href="' . route('listangkakredit.delete', ['id' => $result->id]) . '" class="action-link"><i class="fas fa-trash-can"></i></a>
                </button>' . ' </td>   
                          
            </tr>';

            $iterationNumber++;
        }
        return response($output);
    }
}
