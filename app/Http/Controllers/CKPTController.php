<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKPTController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.ckpt.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.ckpt.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.ckpt.edit');
    }
}
