<?php

namespace App\Imports;

use App\Models\Dapil;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DapilsImport implements ToCollection
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
            $dt[$key]['no_dapil'] = $col[1];
            $dt[$key]['created_at'] = Carbon::now();
            $dt[$key]['updated_at'] = Carbon::now();
        }

        if($this->status == "pass"){
            Dapil::insert($dt);
        }

    }

    public function runCallBack()
    {
        return $this->status;
    }
}
