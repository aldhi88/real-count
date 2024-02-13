<?php

namespace App\Livewire\Rekap;

use App\Models\Dapil;
use Livewire\Component;

class RekapPerDapil extends Component
{
    public $dapilId;
    public $dtRekap = [];
    public $title;
    public $dapil;
    

    public function mount($data)
    {
        $this->dapilId = $data['dapilId'];
        $this->title = $data['title'];
        $this->dapil = $data['dapil'];
        
        
    }

    public function render()
    {
        return view('mods.rekap.rekap_per_dapil');
    }
}
