<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterAngkaKredit extends Controller
{
    public function listangkakredit_index(Request $request)
    {
        return view('pages.admin.listangkakredit.index');
    }

    public function listangkakredit_create(Request $request) 
    {
        return view('pages.admin.listangkakredit.create');       
    }

    public function entriangkakredit_index(Request $request)
    {
        return view('pages.admin.entriangkakredit.index');
    }

    public function entriangkakredit_create(Request $request)
    {
        return view('pages.admin.entriangkakredit.create');
    }
}
