<?php

namespace App\Http\Controllers;

use App\Models\Dapil;
use App\Models\Calon;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Partai;
use App\Models\Tps;
use App\Models\User;
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
    public function partaiDataDt()
    {
        $data = Partai::query();
        return DataTables::of($data)
            ->addColumn('logo_format', function ($data) {
                $img = asset('assets/images/partai/' . $data->logo);
                return '<img src="' . $img . '" alt="" class="rounded avatar-lg">';
            })
            ->rawColumns(['logo_format'])
            ->addIndexColumn()
            ->smart(false)
            ->toJson();
    }
    
    public function calonData()
    {
        $data['page'] = 'calon_data';
        $data['title'] = "Data Calon";
        return view('mods.master.index', compact('data'));
    }
    public function calonDataDt()
    {
        $data = Calon::select('calons.*')
            ->with(['partais', 'dapils']);
        return DataTables::of($data)
            ->addIndexColumn()
            ->smart(false)
            ->toJson();
    }

    public function tpsData()
    {
        $data['page'] = 'tps_data';
        $data['title'] = "Data TPS";
        return view('mods.master.index', compact('data'));
    }
    public function tpsDataDt()
    {
        $data = Tps::select(
                'tps.*'
            )
            ->with([
                'dapils',
                'kecamatans',
                'kelurahans',
            ])
        ;
        return DataTables::of($data)
            ->addIndexColumn()
            ->smart(false)
            ->toJson();
    }

    public function kecamatanData()
    {
        $data['page'] = 'kecamatan_data';
        $data['title'] = "Data Kecamatan";
        return view('mods.master.index', compact('data'));
    }
    public function kecamatanDataDt()
    {
        $data = Kecamatan::query();
        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }

    public function kelurahanData()
    {
        $data['page'] = 'kelurahan_data';
        $data['title'] = "Data Kelurahan";
        return view('mods.master.index', compact('data'));
    }
    public function kelurahanDataDt()
    {
        $data = Kelurahan::select('kelurahans.*')->with(['kecamatans']);
        return DataTables::of($data)
            ->addIndexColumn()
            ->smart(false)
            ->toJson();
    }

    public function dapilData()
    {
        $data['page'] = 'dapil_data';
        $data['title'] = "Data Dapil";
        return view('mods.master.index', compact('data'));
    }
    public function dapilDataDt()
    {
        $data = Dapil::query();
        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }

    public function saksiData()
    {
        $data['page'] = 'saksi_data';
        $data['title'] = "Data Saksi";
        return view('mods.master.index', compact('data'));
    }
    public function saksiDataDt()
    {
        $data = User::select([
                'users.*'
            ])
            ->where('users.id','!=',1)
            ->where('users.id','!=',2)
            ->with([
                'tps',
                'tps.dapils',
                'tps.kecamatans',
                'tps.kelurahans',
            ])
        ;
        return DataTables::of($data)
            // ->addColumn('logo_format', function ($data) {
            //     $img = asset('assets/images/partai/' . $data->logo);
            //     return '<img src="' . $img . '" alt="" class="rounded avatar-lg">';
            // })
            // ->rawColumns(['logo_format'])
            ->addIndexColumn()
            ->smart(false)
            ->toJson();
    }
}
