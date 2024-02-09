<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calon extends Model
{
    use SoftDeletes;

    public function partais()
    {
        return $this->belongsTo(Partai::class, 'partai_id');
    }
    public function dapils()
    {
        return $this->belongsTo(Dapil::class, 'dapil_id');
    }
    public function rekaps():HasMany
    {
        return $this->hasMany(Rekap::class, 'calon_id','id');
    }
}
