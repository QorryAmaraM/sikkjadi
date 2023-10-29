<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterUraianKegiatan extends Controller
{
    public function uraiankegiatan_index(Request $request)
    {
        return view('pages.admin.uraiankegiatan.index');
    }

    public function uraiankegiatan_create(Request $request)
    {
        return view('pages.admin.uraiankegiatan.create');
    }

} 
