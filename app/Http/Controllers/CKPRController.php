<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKPRController extends Controller
{
    public function ckpr_index(Request $request)
    {
        return view('pages.admin.ckpr.index');
    }

    public function ckpr_create(Request $request)
    {
        return view('pages.admin.ckpr.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.ckpr.edit');
    }
}
