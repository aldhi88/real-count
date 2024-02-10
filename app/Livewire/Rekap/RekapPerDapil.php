<?php

namespace App\Livewire\Rekap;

use App\Models\Dapil;
use Livewire\Component;

class RekapPerDapil extends Component
{
    public $dapilId;
    public $dtRekap = [];
    public $title;
    

    public function mount($data)
    {
        $this->dapilId = $data['dapil'];
        $this->title = $data['title'];
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
