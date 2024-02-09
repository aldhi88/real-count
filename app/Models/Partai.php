<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partai extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function rekaps():HasMany
    {
        return $this->hasMany(Rekap::class, 'partai_id','id');
    }
}
