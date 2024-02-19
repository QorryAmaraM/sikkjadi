<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\user;
use App\Models\skp_tahunan;
use App\Models\penilaian_skp;
use App\Models\rencana_kinerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class PenilaianSKPController extends Controller
{
    //Read
    public function index(Request $request)
    {

        $nilai_kinerja_utama = 0;
        $nilai_kinerja_tambahan = 0;
        $simpan = [];
        $userid = Auth::user()->id;
        $user = user::all();
        $result = penilaian_skp::join('rencana_kinerjas', 'rencanakinerja_id', '=', 'rencana_kinerjas.id')
            ->join('skp_tahunans', 'skp_tahunan_id', '=', 'skp_tahunans.id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*', 'penilaian_skps.*')
            ->paginate(3);


        foreach ($result as $penilaian) {
            $kuantitas = $penilaian->kuantitas_kategori_capaian_iki;
            $kualitas = $penilaian->kualitas_kategori_capaian_iki;
            $waktu = $penilaian->waktu_kategori_capaian_iki;


            $sangat_kurang = 0;
            $kurang = 0;
            $cukup = 0;
            $baik = 0;
            $sangat_baik = 0;

            if ($kuantitas == 'sangat kurang') {
                $sangat_kurang++;
            } elseif ($kuantitas == 'kurang') {
                $kurang++;
            } elseif ($kuantitas == 'cukup') {
                $cukup++;
            } elseif ($kuantitas == 'baik') {
                $baik++;
            } elseif ($kuantitas == 'sangat baik') {
                $sangat_baik++;
            }

            if ($kualitas == 'sangat kurang') {
                $sangat_kurang++;
            } elseif ($kualitas == 'kurang') {
                $kurang++;
            } elseif ($kualitas == 'cukup') {
                $cukup++;
            } elseif ($kualitas == 'baik') {
                $baik++;
            } elseif ($kualitas == 'sangat baik') {
                $sangat_baik++;
            }

            if ($waktu == 'sangat kurang') {
                $sangat_kurang++;
            } elseif ($waktu == 'kurang') {
                $kurang++;
            } elseif ($waktu == 'cukup') {
                $cukup++;
            } elseif ($waktu == 'baik') {
                $baik++;
            } elseif ($waktu == 'sangat baik') {
                $sangat_baik++;
            }

            if ($sangat_baik == 2 && $baik == 1 || $sangat_baik == 3 || $sangat_kurang == 0 && $kurang == 0 && $cukup == 0 && $baik == 0 && $sangat_baik == 1) {
                $data['kategori_capaian_rencana'] = 'sangat baik';
                $data['nilai_capaian_rencana'] = 120;
                $data['nilai_tertimbang'] = ((80 / 100) * 120) + ((20 / 100) * 120);
            } elseif ($kurang == 0 && $sangat_kurang == 0 && $cukup == 1 || $kurang == 0 && $sangat_kurang == 0 && $baik >= 2 || $sangat_kurang == 0 && $kurang == 0 && $cukup == 0 && $baik == 1 && $sangat_baik == 0) {
                $data['kategori_capaian_rencana'] = 'baik';
                $data['nilai_capaian_rencana'] = 100;
                $data['nilai_tertimbang'] = ((80 / 100) * 100) + ((20 / 100) * 100);
            } elseif ($sangat_kurang == 0 && $kurang == 1 || $sangat_kurang == 0 && $cukup >= 2 || $sangat_kurang == 0 && $kurang == 0 && $cukup == 1 && $baik == 0 && $sangat_baik == 0) {
                $data['kategori_capaian_rencana'] = 'cukup';
                $data['nilai_capaian_rencana'] = 80;
                $data['nilai_tertimbang'] = ((80 / 100) * 80) + ((10 / 100) * 80);
            } elseif ($sangat_kurang == 1 || $kurang >= 2 || $sangat_kurang == 0 && $kurang == 1 && $cukup == 0 && $baik == 0 && $sangat_baik == 0) {
                $data['kategori_capaian_rencana'] = 'kurang';
                $data['nilai_capaian_rencana'] = 60;
                $data['nilai_tertimbang'] = ((80 / 100) * 60) + ((5 / 100) * 60);
            } elseif ($sangat_kurang >= 2 || $sangat_kurang == 1 && $kurang == 0 && $cukup == 0 && $baik == 0 && $sangat_baik == 0) {
                $data['kategori_capaian_rencana'] = 'sangat kurang';
                $data['nilai_capaian_rencana'] = 25;
                $data['nilai_tertimbang'] = ((80 / 100) * 25) + ((1 / 100) * 25);
            }

            $penilaian->update($data);

            $simpan[] = [
                'kuantitas' => $kuantitas,
                'kualitas' => $kualitas,
                'waktu' => $waktu,
            ];
        }

        $jumlah_utama = $result->where('kinerja', 'utama')->count();
        $jumlah_tambahan = $result->where('kinerja', 'tambahan')->count();

        $sum_utama = $result->where('kinerja', 'utama')->sum('nilai_tertimbang');
        $sum_tambahan = $result->where('kinerja', 'tambahan')->sum('nilai_tertimbang');

        if ($jumlah_utama !== 0 && $sum_utama !== 0) {
            $nilai_kinerja_utama = $sum_utama / $jumlah_utama;
        }
        if ($jumlah_tambahan !== 0 && $sum_tambahan !== 0) {
            $nilai_kinerja_tambahan = $sum_tambahan / $jumlah_tambahan;
        }

        $nilai_skp = $nilai_kinerja_utama + $nilai_kinerja_tambahan;

        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.index', compact(['result', 'user', 'nilai_kinerja_utama', 'nilai_kinerja_tambahan', 'nilai_skp',]));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianskp.index', compact(['result', 'user', 'nilai_kinerja_utama', 'nilai_kinerja_tambahan', 'nilai_skp',]));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianskp.index', compact(['result', 'user', 'nilai_kinerja_utama', 'nilai_kinerja_tambahan', 'nilai_skp',]));
                break;
            case '4':
                return view('pages.users.kf.penilaianskp.index', compact(['result', 'user', 'nilai_kinerja_utama', 'nilai_kinerja_tambahan', 'nilai_skp',]));
                break;
            case '5':
                return view('pages.users.staf.penilaianskp.index', compact(['result', 'user', 'nilai_kinerja_utama', 'nilai_kinerja_tambahan', 'nilai_skp',]));
                break;
        }
    }

    public function print(Request $request)
    {
        $user = Auth::user();
        $userid = Auth::user()->role_id;
        $input_tahun = $request->input('input_tahun');

        $result = penilaian_skp::join('rencana_kinerjas', 'rencanakinerja_id', '=', 'rencana_kinerjas.id')
            ->join('skp_tahunans', 'skp_tahunan_id', '=', 'skp_tahunans.id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*', 'penilaian_skps.*')
            ->where('tahun', 'like', '%' . $input_tahun . '%')
            ->get();

        // dd($result);

        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.print', compact('user', 'result', 'input_tahun'));
                break;
            case '2':
                return view('pages.users.kepalabps.ckpt.print', compact('user', 'result', 'input_tahun'));
                break;
            case '3':
                return view('pages.users.kepalabu.ckpt.print', compact('user', 'result', 'input_tahun'));
                break;
            case '4':
                return view('pages.users.kf.ckpt.print', compact('user', 'result', 'input_tahun'));
                break;
            case '5':
                return view('pages.users.staf.ckpt.print', compact('user', 'result', 'input_tahun'));
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
                return view('pages.users.kepalabps.penilaianskp.create_index', compact(['result', 'user']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianskp.create_index', compact(['result', 'user']));
                break;
            case '4':
                return view('pages.users.kf.penilaianskp.create_index', compact(['result', 'user']));
                break;
            case '5':
                return view('pages.users.staf.penilaianskp.create_index', compact(['result', 'user']));
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

    public function create_kuantitas($id)
    {
        $userid = Auth::user()->id;
        $user = user::all();
        $skp_tahunan = skp_tahunan::all();
        $rencanakinerja_id = $id;
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')->get();

        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.create_kuantitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianskp.create_kuantitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianskp.create_kuantitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '4':
                return view('pages.users.kf.penilaianskp.create_kuantitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '5':
                return view('pages.users.staf.penilaianskp.create_kuantitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
        }
    }

    public function create_kualitas($id)
    {
        $userid = Auth::user()->id;
        $user = user::all();
        $skp_tahunan = skp_tahunan::all();
        $rencanakinerja_id = $id;
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')->get();

        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.create_kualitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianskp.create_kualitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianskp.create_kualitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '4':
                return view('pages.users.kf.penilaianskp.create_kualitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '5':
                return view('pages.users.staf.penilaianskp.create_kualitas', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
        }
    }

    public function create_waktu($id)
    {
        $userid = Auth::user()->id;
        $user = user::all();
        $skp_tahunan = skp_tahunan::all();
        $rencanakinerja_id = $id;
        $result = skp_tahunan::join('rencana_kinerjas', 'skp_tahunans.id', '=', 'rencana_kinerjas.skp_tahunan_id')->select('skp_tahunans.*', 'rencana_kinerjas.*')->get();

        switch ($userid) {
            case '1':
                return view('pages.admin.penilaianskp.create_waktu', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '2':
                return view('pages.users.kepalabps.penilaianskp.create_waktu', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '3':
                return view('pages.users.kepalabu.penilaianskp.create_waktu', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '4':
                return view('pages.users.kf.penilaianskp.create_waktu', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
            case '5':
                return view('pages.users.staf.penilaianskp.create_waktu', compact(['user', 'rencanakinerja_id', 'skp_tahunan', 'result']));
                break;
        }
    }

    public function store(Request $request)
    {

        $userid = Auth::user()->id;
        $data = $request->except(['_token', 'submit']);
        $rencana_kinerja = rencana_kinerja::find($request->rencanakinerja_id);

        if ($request->kuantitas_kondisi) {
            if ($request->kuantitas_kondisi == 'normal') {
                $kuantitas_capaian_iki = round(($request->kuantitas_realisasi / $rencana_kinerja->kuantitas_target_max) * 100);
            } else if ($request->kuantitas_kondisi == 'khusus') {
                $kuantitas_capaian_iki = round((1 + (1 - $request->kuantitas_realisasi / $rencana_kinerja->kuantitas_target_max)) * 100);
            }

            if ($kuantitas_capaian_iki >= 120) {
                $kuantitas_kategori_capaian_iki = 'sangat baik';
            } else if ($kuantitas_capaian_iki >= 100 && $kuantitas_capaian_iki < 120) {
                $kuantitas_kategori_capaian_iki = 'baik';
            } else if ($kuantitas_capaian_iki >= 80 && $kuantitas_capaian_iki < 100) {
                $kuantitas_kategori_capaian_iki = 'cukup';
            } else if ($kuantitas_capaian_iki >= 60 && $kuantitas_capaian_iki < 80) {
                $kuantitas_kategori_capaian_iki = 'kurang';
            } else if ($kuantitas_capaian_iki < 60) {
                $kuantitas_kategori_capaian_iki = 'sangat kurang';
            }

            $data['kuantitas_capaian_iki'] = $kuantitas_capaian_iki;
            $data['kuantitas_kategori_capaian_iki'] = $kuantitas_kategori_capaian_iki;
        } else if ($request->kualitas_kondisi) {
            if ($request->kualitas_kondisi == 'normal') {
                $kualitas_capaian_iki = round(($request->kualitas_realisasi / $rencana_kinerja->kualitas_target_max) * 100);
            } else if ($request->kualitas_kondisi == 'khusus') {
                $kualitas_capaian_iki = round((1 + (1 - $request->kualitas_realisasi / $rencana_kinerja->kualitas_target_max)) * 100);
            }

            if ($kualitas_capaian_iki >= 120) {
                $kualitas_kategori_capaian_iki = 'sangat baik';
            } else if ($kualitas_capaian_iki >= 100 && $kualitas_capaian_iki < 120) {
                $kualitas_kategori_capaian_iki = 'baik';
            } else if ($kualitas_capaian_iki >= 80 && $kualitas_capaian_iki < 100) {
                $kualitas_kategori_capaian_iki = 'cukup';
            } else if ($kualitas_capaian_iki >= 60 && $kualitas_capaian_iki < 80) {
                $kualitas_kategori_capaian_iki = 'kurang';
            } else if ($kualitas_capaian_iki < 60) {
                $kualitas_kategori_capaian_iki = 'sangat kurang';
            }

            $data['kualitas_capaian_iki'] = $kualitas_capaian_iki;
            $data['kualitas_kategori_capaian_iki'] = $kualitas_kategori_capaian_iki;
        } else if ($request->waktu_kondisi) {
            if ($request->waktu_kondisi == 'normal') {
                $waktu_capaian_iki = round(($request->waktu_realisasi / $rencana_kinerja->waktu_target_max) * 100);
            } else if ($request->waktu_kondisi == 'khusus') {
                $waktu_capaian_iki = round((1 + (1 - $request->waktu_realisasi / $rencana_kinerja->waktu_target_max)) * 100);
            }

            if ($waktu_capaian_iki >= 120) {
                $waktu_kategori_capaian_iki = 'sangat baik';
            } else if ($waktu_capaian_iki >= 100 && $waktu_capaian_iki < 120) {
                $waktu_kategori_capaian_iki = 'baik';
            } else if ($waktu_capaian_iki >= 80 && $waktu_capaian_iki < 100) {
                $waktu_kategori_capaian_iki = 'cukup';
            } else if ($waktu_capaian_iki >= 60 && $waktu_capaian_iki < 80) {
                $waktu_kategori_capaian_iki = 'kurang';
            } else if ($waktu_capaian_iki < 60) {
                $waktu_kategori_capaian_iki = 'sangat kurang';
            }

            $data['waktu_capaian_iki'] = $waktu_capaian_iki;
            $data['waktu_kategori_capaian_iki'] = $waktu_kategori_capaian_iki;
        }

        $penilaian = penilaian_skp::all();

        $found = $penilaian->contains('rencanakinerja_id', $data['rencanakinerja_id']);

        if ($penilaian->isEmpty()) {
            penilaian_skp::create($data);
        } else if ($found) {
            $penilaian_skp = $penilaian->where('rencanakinerja_id', $data['rencanakinerja_id'])->first();
            $penilaian_skp->update($data);
        } else {
            penilaian_skp::create($data);
        }

        switch ($userid) {
            case '1':
                sleep(1);
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
        $lastutama = false;
        $lasttambahan = false;

        $result = penilaian_skp::join('rencana_kinerjas', 'rencanakinerja_id', '=', 'rencana_kinerjas.id')
            ->join('skp_tahunans', 'skp_tahunan_id', '=', 'skp_tahunans.id')
            ->select('skp_tahunans.*', 'rencana_kinerjas.*', 'penilaian_skps.*')
            ->where('skp_tahunans.user_id', 'like', '%' . $request->search . '%')
            ->where('skp_tahunans.unit_kerja', 'like', '%' . $request->unitkerja . '%')
            ->where('rencana_kinerjas.kinerja', 'like', '%' . $request->kinerja . '%')
            ->get();

        foreach ($result as $utama) {
            if ($utama->kinerja == "utama") {
                $output .=
                    '<tr> 
                
                <td rowspan="3" > ' . $utama->kinerja . ' </td>
                <td rowspan="3" > ' . $utama->rencana_kinerja_atasan . ' </td>
                <td rowspan="3" > ' . $utama->rencana_kinerja . ' </td>
    
                <td > ' . 'Kuantitas' . ' </td>            
                <td > ' . $utama->kuantitas_iki . ' </td>            
                <td > ' . $utama->kuantitas_target_min . ' </td>            
                <td > ' . $utama->kuantitas_target_max . ' </td>            
                <td > ' . $utama->kuantitas_satuan . ' </td>
                <td > ' . $utama->kuantitas_realisasi . ' </td>
                <td > ' . $utama->kuantitas_kondisi . ' </td>
                <td > ' . $utama->kuantitas_capaian_iki . ' </td>
                <td > ' . $utama->kuantitas_kategori_capaian_iki . ' </td>
    
                <td rowspan="3" > ' . $utama->kategori_capaian_rencana . ' </td>
                <td rowspan="3" > ' . $utama->nilai_capaian_rencana . ' </td>
                <td rowspan="3" > ' . $utama->nilai_tertimbang . ' </td>
                              
                </tr>' .

                    '<tr> 
                <td > ' . 'Kualitas' . ' </td>            
                <td > ' . $utama->kualitas_iki . ' </td>            
                <td > ' . $utama->kualitas_target_min . ' </td>            
                <td > ' . $utama->kualitas_target_max . ' </td>            
                <td > ' . $utama->kualitas_satuan . ' </td>
                <td > ' . $utama->kualitas_realisasi . ' </td>
                <td > ' . $utama->kualitas_kondisi . ' </td>
                <td > ' . $utama->kualitas_capaian_iki . ' </td>
                <td > ' . $utama->kualitas_kategori_capaian_iki . ' </td>
                              
                </tr>' .

                    '<tr> 
                <td > ' . 'Kualitas' . ' </td>            
                <td > ' . $utama->waktu_iki . ' </td>            
                <td > ' . $utama->waktu_target_min . ' </td>            
                <td > ' . $utama->waktu_target_max . ' </td>            
                <td > ' . $utama->waktu_satuan . ' </td>
                <td > ' . $utama->waktu_realisasi . ' </td>
                <td > ' . $utama->waktu_kondisi . ' </td>
                <td > ' . $utama->waktu_capaian_iki . ' </td>
                <td > ' . $utama->waktu_kategori_capaian_iki . ' </td>
                              
                </tr>';
                $lastutama = true;
            }
        }

        if ($lastutama) {
            $output .=
                '<tr> 
                
                <td style="background-color: #9ba4b5; color: #000; font-weight: bold;" > ' . 'Nilai Kinerja Utama' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>               
                
                </tr>';
        }


        foreach ($result as $tambahan) {
            if ($tambahan->kinerja == "tambahan") {
                $output .=
                    '<tr> 
                    
                    <td rowspan="3" > ' . $tambahan->kinerja . ' </td>
                    <td rowspan="3" > ' . $tambahan->rencana_kinerja_atasan . ' </td>
                    <td rowspan="3" > ' . $tambahan->rencana_kinerja . ' </td>
        
                    <td > ' . 'Kuantitas' . ' </td>            
                    <td > ' . $tambahan->kuantitas_iki . ' </td>            
                    <td > ' . $tambahan->kuantitas_target_min . ' </td>            
                    <td > ' . $tambahan->kuantitas_target_max . ' </td>            
                    <td > ' . $tambahan->kuantitas_satuan . ' </td>
                    <td > ' . $tambahan->kuantitas_realisasi . ' </td>
                    <td > ' . $tambahan->kuantitas_kondisi . ' </td>
                    <td > ' . $tambahan->kuantitas_capaian_iki . ' </td>
                    <td > ' . $tambahan->kuantitas_kategori_capaian_iki . ' </td>
        
                    <td rowspan="3" > ' . $tambahan->kategori_capaian_rencana . ' </td>
                    <td rowspan="3" > ' . $tambahan->nilai_capaian_rencana . ' </td>
                    <td rowspan="3" > ' . $tambahan->nilai_tertimbang . ' </td>
                                  
                    </tr>' .

                    '<tr> 
                    <td > ' . 'Kualitas' . ' </td>            
                    <td > ' . $tambahan->kualitas_iki . ' </td>            
                    <td > ' . $tambahan->kualitas_target_min . ' </td>            
                    <td > ' . $tambahan->kualitas_target_max . ' </td>            
                    <td > ' . $tambahan->kualitas_satuan . ' </td>
                    <td > ' . $tambahan->kualitas_realisasi . ' </td>
                    <td > ' . $tambahan->kualitas_kondisi . ' </td>
                    <td > ' . $tambahan->kualitas_capaian_iki . ' </td>
                    <td > ' . $tambahan->kualitas_kategori_capaian_iki . ' </td>
                                  
                    </tr>' .

                    '<tr> 
                    <td > ' . 'Kualitas' . ' </td>            
                    <td > ' . $tambahan->waktu_iki . ' </td>            
                    <td > ' . $tambahan->waktu_target_min . ' </td>            
                    <td > ' . $tambahan->waktu_target_max . ' </td>            
                    <td > ' . $tambahan->waktu_satuan . ' </td>
                    <td > ' . $tambahan->waktu_realisasi . ' </td>
                    <td > ' . $tambahan->waktu_kondisi . ' </td>
                    <td > ' . $tambahan->waktu_capaian_iki . ' </td>
                    <td > ' . $tambahan->waktu_kategori_capaian_iki . ' </td>
                                  
                    </tr>';
                $lasttambahan = true;
            }
        }

        if ($lasttambahan) {
            $output .=
                '<tr> 
                
                <td style="background-color: #9ba4b5; color: #000; font-weight: bold;" > ' . 'Nilai Kinerja Tambahan' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>
                <td style="background-color: #9ba4b5" > ' . '' . ' </td>               
                
                </tr>';
        }





        return response($output);
    }
}
