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

    public function calonData()
    {
        $data['page'] = 'calon_data';
        $data['title'] = "Data Calon";
        return view('mods.master.index', compact('data'));
    }

    public function tpsData()
    {
        $data['page'] = 'tps_data';
        $data['title'] = "Data TPS";
        return view('mods.master.index', compact('data'));
    }

    public function kecamatanData()
    {
        $data['page'] = 'kecamatan_data';
        $data['title'] = "Data Kecamatan";
        return view('mods.master.index', compact('data'));
    }
}
