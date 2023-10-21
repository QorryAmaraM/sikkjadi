<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerencanaanKerja extends Controller
{
    public function skptahunan_index(Request $request)
    {
        return view('pages.admin.skptahunan.index');
    }

    public function skptahunan_create(Request $request)
    {
        return view('pages.admin.skptahunan.create');
    }

    public function skptahunan_update(Request $request)
    {
        return view('pages.admin.skptahunan.edit');
    }

    public function rencanakinerja_index(Request $request)
    {
        return view('pages.admin.rencanakinerja.index');
    }

    public function rencanakinerja_create(Request $request)
    {
        return view('pages.admin.rencanakinerja.create');
    }

    public function penilaianskp_index(Request $request)
    {
        return view('pages.admin.penilaianskp.index');
    }

    public function penilaianskp_create(Request $request)
    {
        return view('pages.admin.penilaianskp.create');
    }


}
