<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterUraianKegiatan extends Controller
{
    public function uraianakegiatan_index(Request $request)
    {
        return view('pages.admin.uraiankegiatan.index');
    }

    public function uraianakegiatan_create(Request $request)
    {
        return view('pages.admin.uraiankegiatan.create');
    }

}
