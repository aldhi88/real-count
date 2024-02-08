<?php

namespace App\Http\Controllers;

use App\Models\Partai;
use Illuminate\Http\Request;
use DataTables;

class MasterController extends Controller
{
    public function partaiData()
    {
        $data['page'] = 'partai_data';
        $data['title'] = "Data Partai";
        return view('mods.master.index', compact('data'));
    }
    public function partaiDataDt(){
        $data = Partai::query();
        return DataTables::of($data)
            ->addColumn('logo_format', function($data){
                $img = asset('assets/images/partai/'.$data->logo);
                return '<img src="'.$img.'" alt="" class="rounded avatar-lg">';
            })
            ->rawColumns(['logo_format'])
            ->addIndexColumn()
            ->toJson();

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
    public function kelurahanData()
    {
        $data['page'] = 'kelurahan_data';
        $data['title'] = "Data Kelurahan";
        return view('mods.master.index', compact('data'));
    }

    public function dapilData()
    {
        $data['page'] = 'dapil_data';
        $data['title'] = "Data Dapil";
        return view('mods.master.index', compact('data'));
    }
}
