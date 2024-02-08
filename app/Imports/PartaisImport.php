<?php

namespace App\Imports;

use App\Models\Partai;
use Maatwebsite\Excel\Concerns\ToModel;

class PartaisImport implements ToModel
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

    public function model(array $col)
    {
        return new User([
            'id' => $col[0],
            'nama_partai' => $col[1],
            'logo' => $col[2]
        ]);
    }
}
