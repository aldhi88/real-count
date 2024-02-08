<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tps extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function dapils():BelongsTo
    {
        return $this->belongsTo(Dapil::class, 'dapil_id', 'id');
    }
    public function kecamatans():BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
    public function kelurahans():BelongsTo
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    }
}
