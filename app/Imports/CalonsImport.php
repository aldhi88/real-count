<?php

namespace App\Imports;

use App\Models\Calon;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CalonsImport implements ToCollection
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
            $dt[$key]['partai_id'] = $col[1];
            $dt[$key]['dapil_id'] = $col[2];
            $dt[$key]['nama'] = $col[3];
            $dt[$key]['no_urut'] = $col[4];
            $dt[$key]['gender'] = $col[5];
            $dt[$key]['created_at'] = Carbon::now();
            $dt[$key]['updated_at'] = Carbon::now();
        }

        if($this->status == "pass"){
            Calon::insert($dt);
        }

    }

    public function runCallBack()
    {
        return $this->status;
    }
}
