<?php

namespace App\Livewire\Master;

use App\Imports\KelurahansImport;
use App\Models\Kecamatan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class KelurahanData extends Component
{

    use WithFileUploads;

    public $file_import;
    public $dtKec = [];

    public function rules()
    {
        return [
            "file_import" => "required|mimes:xlsx",
        ];
    }

    protected $validationAttributes = [
        "file_import" => "File Excel",
    ];

    public function mount()
    {
        $this->dtKec = Kecamatan::all()->toArray();
    }

    public function importData()
    {
        $this->validate();
        $import = new KelurahansImport();
        Excel::import($import, $this->file_import);
        if (($import->runCallBack()) == "pass") {
            $this->dispatch('reloadDt');
            $this->dispatch('alert', data: ['type' => 'success',  'message' => 'Data Kelurahan berhasil ditambahkan.']);
        } else {
            $this->dispatch('alert', data: ['type' => 'error',  'message' => 'Error export file.']);
        }
    }
    public function render()
    {
        return view('mods.master.kelurahan_data');
    }
}
