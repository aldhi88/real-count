<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    protected $guarded = [];
    
    public function calons()
    {
        return $this->belongsTo(Calon::class, 'calon_id');
    }
    public function partais()
    {
        return $this->belongsTo(Partai::class, 'partai_id');
    }
    public function dapils()
    {
        return $this->belongsTo(Dapil::class, 'dapil_id');
    }
    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
    public function kelurahans()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
    public function tps()
    {
        return $this->belongsTo(Tps::class, 'tps_id');
    }
}
