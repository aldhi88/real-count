<?php

namespace App\Livewire\Saksi;

use App\Models\Partai;
use App\Models\Rekap;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormHasil extends Component
{

    public $calon_golkar = [];
    public $calon_lain = [];
    public $list_partai = [];

    public function mount()
    {
        $this->list_partai = Partai::query()
            ->with([
                'rekaps'=> function(Builder $q){
                    $q->where('tps_id', Auth::user()->tps->id)
                    ->with([
                        'calons',
                        // 'partais',
                        // 'kecamatans',
                        // 'kelurahans',
                        // 'tps',
                    ]);
                }
            ])
            ->orderBy('id','asc')
            ->get()
            ->toArray();
        
    }

    public function updating($property, $value)
    {
        $array = explode(".", $property);

        $in1 = $array[1];
        $in2 = $array[3];
        
        $value = trim($value);
        if($value != null || $value != ""){
            $this->list_partai[$in1]['rekaps'][$in2]['jumlah'] = $value;
            $id = $this->list_partai[$in1]['rekaps'][$in2]['id'];
            Rekap::find($id)->update(['jumlah' => $value]);
        }else{
            $this->list_partai[$in1]['rekaps'][$in2]['jumlah'] = 0;
        }


    }

    public function onPlus($index1,$index2,$id)
    {
        $this->list_partai[$index1]['rekaps'][$index2]['jumlah'] += 1;
        Rekap::find($id)->update(['jumlah' => $this->list_partai[$index1]['rekaps'][$index2]['jumlah']]);
    }

    public function onMinus($index1,$index2,$id)
    {
        if($this->list_partai[$index1]['rekaps'][$index2]['jumlah'] > 0){
            $this->list_partai[$index1]['rekaps'][$index2]['jumlah'] -= 1;
            Rekap::find($id)->update(['jumlah' => $this->list_partai[$index1]['rekaps'][$index2]['jumlah']]);
        }
    }

    public function render()
    {
        return view('mods.saksi.form_hasil');
    }
}
