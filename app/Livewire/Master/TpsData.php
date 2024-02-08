<?php

namespace App\Livewire\Master;

use Livewire\Component;
use Livewire\WithFileUploads;

class TpsData extends Component
{
    use WithFileUploads;

    public $file_import;

    public function rules()
    {
        return [
            "file_import" => "required|mimes:xlsx",
        ];
    }

    protected $validationAttributes = [
        "file_import" => "File Excel",
    ];

    public function importData()
    {
        $this->validate();
        dd('oke');
    }

    public function render()
    {
        return view('mods.master.tps_data');
    }
}
