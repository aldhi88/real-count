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

use function PHPUnit\Framework\isNull;

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
            ->with(['partais', 'dapils'])
            ->where('no_urut', '!=',0);
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
            ->addColumn('status_kirim_format', function($data){
                if($data->status_kirim==0){
                    return '<h5 style="cursor: pointer" class="status-kirim mb-0" key="'.$data->id.'" value="'.$data->status_kirim.'"><span class="w-100 badge badge-secondary">Belum Dikirim</span></h5>';
                }else{
                    return '<h5 style="cursor: pointer" class="status-kirim mb-0" key="'.$data->id.'" value="'.$data->status_kirim.'"><span class="w-100 badge badge-success">Sudah Dikirim</span></h5>';
                }
            })
            ->addColumn('status_terima_format', function($data){
                if($data->status_terima==0){
                    return '<h5 style="cursor: pointer" class="status-terima mb-0" key="'.$data->id.'" value="'.$data->status_terima.'"><span class="w-100 badge badge-secondary">Belum Diterima</span></h5>';
                }else{
                    return '<h5 style="cursor: pointer" class="status-terima mb-0" key="'.$data->id.'" value="'.$data->status_terima.'"><span class="w-100 badge badge-success">Sudah Diterima</span></h5>';
                }
            })
            ->addColumn('nama_format', function ($data) {
                return '<input class="input-nama" type="text" value="'.$data->nama.'" key="'.$data->id.'">';
            })
            ->addColumn('hp_format', function ($data) {
                return '<input class="input-hp" type="text" value="'.$data->hp.'" key="'.$data->id.'">';
            })
            ->addColumn('hp_wa', function ($data) {
                return '<a target="_blank" class="btn btn-success btn-sm" href="https://wa.me/'.$data->hp.'"><i class="fab fa-whatsapp"></i></a>';
            })
            ->rawColumns(['status_kirim_format','status_terima_format','hp_format','hp_wa','nama_format'])
            ->addIndexColumn()
            ->smart(false)
            ->toJson();
    }
}
