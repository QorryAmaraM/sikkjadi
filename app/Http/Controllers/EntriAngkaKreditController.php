<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntriAngkaKreditController extends Controller
{
    public function admin_index(Request $request)
    {
        return view('pages.admin.entriangkakredit.index');
    }

    public function admin_create(Request $request)
    {
        return view('pages.admin.entriangkakredit.create');
    }

    public function admin_edit(Request $request)
    {
        return view('pages.admin.entriangkakredit.edit');
    }
}
