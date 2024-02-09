<?php

namespace App\Livewire\Rekap;

use App\Models\Dapil;
use Livewire\Component;

class RekapPerDapil extends Component
{
    public $dapilId;
    public $dtRekap = [];
    

    public function mount($data)
    {
        $this->dapilId = $data;
        // $this->dtRekap = Dapil::where('id',$data)
        //     ->get()
        //     ->toArray();

        // dd($this->all());
        
    }

    public function render()
    {
        return view('mods.rekap.rekap_per_dapil');
    }
}
