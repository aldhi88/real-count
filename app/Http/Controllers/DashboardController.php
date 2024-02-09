<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::id()==1 || Auth::id()==2){
            $data['page'] = 'dashboard_admin';
        }else{
            $data['page'] = 'dashboard_saksi';
        }

        $data['title'] = "Dashboard";
        return view('mods.dashboard.index', compact('data'));
    }
}
