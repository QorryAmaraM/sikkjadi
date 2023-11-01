<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListUraianKegiatanController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.uraiankegiatan.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.uraiankegiatan.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.uraiankegiatan.edit');
    }
}
