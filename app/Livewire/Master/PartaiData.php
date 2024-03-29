<?php

namespace App\Livewire\Master;

use App\Imports\PartaisImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class PartaiData extends Component
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
        $import = new PartaisImport();
        Excel::import($import, $this->file_import);
        if(($import->runCallBack())=="pass"){
            $this->dispatch('reloadDt');
            $this->dispatch('alert', data:['type' => 'success',  'message' => 'Data Partai berhasil ditambahkan.']);
        }else{
            $this->dispatch('alert', data:['type' => 'error',  'message' => 'Error export file.']);
        }
    }


    public function render()
    {
        return view('mods.master.partai_data');
    }


}
