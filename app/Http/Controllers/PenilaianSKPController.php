<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenilaianSKPController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.penilaianskp.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.penilaianskp.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.penilaianskp.edit');
    }
}
