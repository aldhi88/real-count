<?php

namespace App\Livewire\Master;

use App\Imports\TpsImport;
use App\Models\Dapil;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class TpsData extends Component
{
    use WithFileUploads;

    public $file_import;
    public $dtDapil=[];
    public $dtKec=[];
    public $dtKel=[];

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
        $this->dtDapil = Dapil::all()->toArray();
        $this->dtKec = Kecamatan::all()->toArray();
        $this->dtKel = Kelurahan::all()->toArray();
    }

    public function importData()
    {
        $this->validate();
        $import = new TpsImport();
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
        return view('mods.master.tps_data');
    }
}
