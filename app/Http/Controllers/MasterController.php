<?php

namespace App\Http\Controllers;

use App\Models\Dapil;
use App\Models\Calon;
use App\Models\Kelurahan;
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
    public function partaiDataDt()
    {
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
    public function calonDataDt(){
        $data = Calon::query();
        return DataTables::of($data)
            // ->addColumn('action', function($data){
            //     return '
            //         <div class="btn-group">
            //             <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
            //                 <i class="mdi mdi-dots-vertical"></i>
            //             </a>
            //             <div class="dropdown-menu" style="">
            //                 <a class="dropdown-item" data-id="'.$data->id.'" href="javascript:void(0);" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i> Edit</a>
            //             </div>
            //         </div>
            //     ';
            // })

            ->addColumn('logo_format', function($data){
                return 'logo';
            })
            // ->rawColumns(['action'])
            ->toJson();

    }
    public function kelurahanDataDt(){
        $data = Kelurahan::query();
        return DataTables::of($data)
            // ->addColumn('action', function($data){
            //     return '
            //         <div class="btn-group">
            //             <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
            //                 <i class="mdi mdi-dots-vertical"></i>
            //             </a>
            //             <div class="dropdown-menu" style="">
            //                 <a class="dropdown-item" data-id="'.$data->id.'" href="javascript:void(0);" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i> Edit</a>
            //             </div>
            //         </div>
            //     ';
            // })

            ->addColumn('logo_format', function($data){
                return 'logo';
            })
            // ->rawColumns(['action'])
            ->toJson();

    }
    public function dapilDataDt(){
        $data = Dapil::query();
        return DataTables::of($data)
            // ->addColumn('action', function($data){
            //     return '
            //         <div class="btn-group">
            //             <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
            //                 <i class="mdi mdi-dots-vertical"></i>
            //             </a>
            //             <div class="dropdown-menu" style="">
            //                 <a class="dropdown-item" data-id="'.$data->id.'" href="javascript:void(0);" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i> Edit</a>
            //             </div>
            //         </div>
            //     ';
            // })

            ->addColumn('logo_format', function ($data) {
                return 'logo';
            })
            // ->rawColumns(['action'])
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
    public function tpsDataDt()
    {
        $data = tps::query();
        return DataTables::of($data)
            // ->addColumn('action', function($data){
            //     return '
            //         <div class="btn-group">
            //             <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
            //                 <i class="mdi mdi-dots-vertical"></i>
            //             </a>
            //             <div class="dropdown-menu" style="">
            //                 <a class="dropdown-item" data-id="'.$data->id.'" href="javascript:void(0);" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i> Edit</a>
            //             </div>
            //         </div>
            //     ';
            // })

            // ->rawColumns(['action'])
            ->toJson();
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
