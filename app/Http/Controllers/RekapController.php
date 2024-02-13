<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Dapil;
use App\Models\Partai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class RekapController extends Controller
{
    public function rekapPerDapil($dapilId)
    {
        $data['page'] = 'rekap_per_dapil';
        $data['title'] = "REKAP PER DAPIL ".$dapilId;
        $data['dapilId'] = $dapilId;
        $data['dapil'] = Dapil::all()->toArray();

        return view('mods.rekap.index', compact('data'));
    }
    
    public function rekapPerDapilDt(Request $request)
    {
        $data = Calon::select([
                'calons.*'
            ])
            ->withCount([
                'rekaps as total_suara' => function($q){
                    $q->select(DB::raw('SUM(jumlah)'));
                }
            ])
            ->with([
                'partais'
            ])
            ->where('partai_id', 8)
        ;

        if(isset($request->dapilId)){
            $data->where('dapil_id',$request->dapilId);
        }
        
        return DataTables::of($data)
            ->addColumn('logo_format', function ($data) {
                $img = asset('assets/images/partai/' . $data->logo);
                return '<img src="' . $img . '" alt="" class="rounded avatar-lg">';
            })
            ->rawColumns(['logo_format'])
            ->addIndexColumn()
            ->toJson();
    }

    public function rekapPerDapilDt2(Request $request)
    {
        $data = Partai::select([
                'partais.*'
            ])
            ->where('id', '!=', 8)
            ->withCount([
                'rekaps as total_suara' => function($q) use($request){
                    $q->select(DB::raw('SUM(jumlah)'))
                        ->where('dapil_id',$request->dapilId);
                }
            ])
        ;
        
        // dd($data->get()->toArray());


        // if(isset($request->dapilId)){
        //     $data->where('dapil_id',$request->dapilId);
        // }
        
        return DataTables::of($data)
            // ->addColumn('logo_format', function ($data) {
            //     $img = asset('assets/images/partai/' . $data->logo);
            //     return '<img src="' . $img . '" alt="" class="rounded avatar-lg">';
            // })
            // ->rawColumns(['logo_format'])
            ->addIndexColumn()
            ->toJson();
    }
}
