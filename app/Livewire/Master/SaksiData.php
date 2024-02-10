<?php

namespace App\Livewire\Master;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Livewire\Component;

class SaksiData extends Component
{

    public $dtKec;
    public $dtKel;

    public function mount()
    {
        $this->dtKec = Kecamatan::all()->toArray();
        $this->dtKel = Kelurahan::all()->toArray();
    }

    public function render()
    {
        return view('mods.master.saksi_data');
    }
}
