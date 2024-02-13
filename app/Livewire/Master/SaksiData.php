<?php

namespace App\Livewire\Master;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Str;

class SaksiData extends Component
{

    public $dtKec;
    public $dtKel;

    public function mount()
    {
        $this->dtKec = Kecamatan::all()->toArray();
        $this->dtKel = Kelurahan::all()->toArray();
    }

    public function render()
    {
        return view('mods.master.saksi_data');
    }

    #[On('saksidata-nama')]
    public function nama($data)
    {
        User::find($data['id'])->update(['nama'=>$data['nama']]);
    }
    #[On('saksidata-hp')]
    public function hp($data)
    {
        User::find($data['id'])->update(['hp'=>$data['hp']]);
    }

    #[On('saksidata-statusKirim')]
    public function statusKirim($data)
    {
        if($data['status_kirim']==0){
            User::find($data['id'])->update(['status_kirim'=>1]);
        }else{
            User::find($data['id'])->update(['status_kirim'=>0]);
        }
    }
    #[On('saksidata-statusTerima')]
    public function statusTerima($data)
    {
        if($data['status_terima']==0){
            User::find($data['id'])->update(['status_terima'=>1]);
        }else{
            User::find($data['id'])->update(['status_terima'=>0]);
        }
    }

    #[On('saksidata-resetPass')]
    public function resetPass($data)
    {
        User::find($data['id'])->update(['password'=>$data['pass']]);
    }
}
