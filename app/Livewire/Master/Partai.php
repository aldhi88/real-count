<?php

namespace App\Livewire\Master;

use Livewire\Component;

class Partai extends Component
{
    public $file_import;

    public function rules()
    {
        return [
            "file_import" => "required|mimes:xlsx",
        ];
    }

    protected $validationAttributes = [
        "file_import" => "File Excel belum dipilih",
        
    ];

    public function importData()
    {
        $this->validate();
        dd('ok');
    }


    public function render()
    {
        return view('mods.master.partai_data');
    }

    
}
