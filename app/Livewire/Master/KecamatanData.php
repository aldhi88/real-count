<?php

namespace App\Livewire\Master;

use Livewire\Component;
use Livewire\WithFileUploads;

class KecamatanData extends Component
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
        dd('okee');
    }

    public function render()
    {
        return view('mods.master.kecamatan_data');
    }
}
