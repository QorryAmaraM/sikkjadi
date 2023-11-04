<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenilaianCKPRController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.penilaianckpr.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.penilaianckpr.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.penilaianckpr.edit');
    }
}
