<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntriAngkaKreditController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.entriangkakredit.index');
    }

    public function create(Request $request)
    {
        return view('pages.admin.entriangkakredit.create');
    }

    public function edit(Request $request)
    {
        return view('pages.admin.entriangkakredit.edit');
    }
}
