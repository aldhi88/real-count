<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class RekapController extends Controller
{
    public function rekapPerDapil($dapilId)
    {
        $data['page'] = 'rekap_per_dapil';
        $data['title'] = "Rekap Data Per Dapil ".$dapilId;
        $data['dapil'] = $dapilId;
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
}
