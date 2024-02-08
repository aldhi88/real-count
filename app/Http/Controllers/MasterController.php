<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function partaiData()
    {
        $data['page'] = 'partai_data';
        $data['title'] = "Data Partai";
        return view('mods.master.index', compact('data'));
    }
}
