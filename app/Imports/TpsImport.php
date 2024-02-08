<?php

namespace App\Imports;

use App\Models\Tps;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TpsImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

     private $status;

     public function __construct()
     {
         $this->status = 'pass';
     }
 
     public function collection(Collection $data)
     {
         foreach ($data->toArray() as $key => $col) {
             $dt[$key]['id'] = $col[0];
             $dt[$key]['dapil_id'] = $col[1];
             $dt[$key]['kecamatan_id'] = $col[2];
             $dt[$key]['kelurahan_id'] = $col[3];
             $dt[$key]['no_tps'] = $col[4];
             $dt[$key]['jlh_pemilih'] = $col[5];
             $dt[$key]['created_at'] = Carbon::now();
             $dt[$key]['updated_at'] = Carbon::now();
         }
 
         if($this->status == "pass"){
             Tps::insert($dt);
         }
 
     }
 
     public function runCallBack()
     {
         return $this->status;
     }
 }
 