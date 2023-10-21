<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKPController extends Controller
{
    public function ckpt_index(Request $request)
    {
        return view('pages.admin.ckpt.index');
    }

    public function ckpt_create(Request $request)
    {
        return view('pages.admin.ckpt.create');
    }

    public function ckpr_index(Request $request)
    {
        return view('pages.admin.ckpr.index');
    }

    public function ckpr_create(Request $request)
    {
        return view('pages.admin.ckpr.create');
    }

    public function penilaianckpr_index(Request $request)
    {
        return view('pages.admin.penilaianckpr.index');
    }

    public function penilaianckpr_create(Request $request)
    {
        return view('pages.admin.penilaianckpr.create');
    }
}
