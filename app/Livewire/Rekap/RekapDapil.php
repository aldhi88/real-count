<?php

namespace App\Livewire\Rekap;

use Livewire\Component;

class RekapDapil extends Component
{
    public $title;
    public $totalDapil;
    public function mount($data)
    {
        $this->title = $data['title'];
        $this->totalDapil = count($data['dapil']);
        
    }

    public function render()
    {
        return view('mods.rekap.rekap_dapil');
    }
}
