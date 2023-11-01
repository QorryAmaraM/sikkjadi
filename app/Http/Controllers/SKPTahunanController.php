<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SKPTahunanController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.skptahunan.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.skptahunan.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.skptahunan.edit');
    }
}
