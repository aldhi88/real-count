<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['page'] = 'index';
        $data['title'] = "Dashboard";
        return view('mods.dashboard.index', compact('data'));
    }
}
