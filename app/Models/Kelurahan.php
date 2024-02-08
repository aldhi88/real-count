<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{
    use SoftDeletes;

    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
