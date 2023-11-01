<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListAngkaKreditController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.listangkakredit.index');
    }

    public function create(Request $request) 
    {
        return view('pages.admin.listangkakredit.create');       
    }

    public function edit(Request $request)
    {
        return view('pages.admin.listangkakredit.edit');
    }
}
