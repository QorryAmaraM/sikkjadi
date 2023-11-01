<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class REncanaKinerjaController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.rencanakinerja.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.rencanakinerja.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.rencanakinerja.edit');
    }
}
