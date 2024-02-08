<?php

namespace App\Imports;

use App\Models\Kecamatan;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class KecamatanImport implements ToCollection
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
            $dt[$key]['nama_kecamatan'] = $col[1];
            $dt[$key]['created_at'] = Carbon::now();
            $dt[$key]['updated_at'] = Carbon::now();
        }

        if ($this->status == "pass") {
            Kecamatan::insert($dt);
        }
    }

    public function runCallBack()
    {
        return $this->status;
    }
}
