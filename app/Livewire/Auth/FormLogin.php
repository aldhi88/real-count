<?php

namespace App\Livewire\Auth;

use App\Models\Dapil;
use App\Models\Tps;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormLogin extends Component
{

    public $dt_roles;
    public $as = 0;
    public $dt_dapil = [];
    public $dt_kecamatan = [];
    public $dt_kelurahan = [];
    public $dt_tps = [];

    public $temp_tps = [];


    public $dapil_id;
    public $kecamatan_id;
    public $kelurahan_id;
    public $tps_id;

    public $username;
    public $password;

    public function rules()
    {
        return [
            "username" => "required",
            "password" => "required",
        ];
    }

    protected $validationAttributes = [
        "file_import" => "File Excel",
    ];

    public function mount()
    {
        // $this->dt_roles = [
        //     'Partai',
        //     'Saksi TPS',
        // ];

        // $this->dt_dapil = Dapil::all()->toArray();
    }

    public function login()
    {
        $data = $this->validate();
        // $data['auth_role_id'] = is_null($data['auth_role_id'])?1:$data['auth_role_id'];

        $q = User::query()
            ->where('username', $data['username'])
            ->get();
            
        if($q->count() == 1){
            if(Hash::check($data['password'], $q[0]['password'])){
                Auth::loginUsingId($q[0]['id']);
                return redirect()->route('anchor');
            }
            session()->flash('message', 'Kata Sandi tidak sesuai.');

        }else{
            if($data['password'] == $q[0]['password']){
                Auth::loginUsingId($q[0]['id']);
                return redirect()->route('anchor');
            }else{
                session()->flash('message', 'ID Login anda tidak ditemukan');
            }
        }
    }

    public function pickDapil()
    {
        if($this->dapil_id == 0){
            $this->reset(
                'dt_kecamatan',
                'dt_kelurahan',
                'dt_tps',
            );
        }else{
            $this->temp_tps = Tps::select([
                    'tps.id',
                    'tps.dapil_id',
                    'tps.kecamatan_id',
                    'tps.kelurahan_id',
                    'tps.no_tps',
                    'tps.jlh_pemilih',
                ])
                ->where('dapil_id', $this->dapil_id)
                ->with([
                    'kecamatans' => function(Builder $q){
                        $q->select('id','nama_kecamatan');
                    },
                    'kelurahans' => function(Builder $q){
                        $q->select('id','kecamatan_id','nama_kelurahan');
                    },
                ])
                ->get()
                ->toArray();
            
            $filterKecamantan = array_values((collect($this->temp_tps))
                ->groupBy('kecamatan_id')
                ->toArray());
            foreach ($filterKecamantan as $key => $value) {
                $this->dt_kecamatan[$key]['id'] = $value[0]['kecamatans']['id'];
                $this->dt_kecamatan[$key]['nama_kecamatan'] = $value[0]['kecamatans']['nama_kecamatan'];
            }
        }
    }

    public function pickKecamatan()
    {
        $this->reset(
            'dt_kelurahan',
            'dt_tps',
        );
        if($this->kecamatan_id==0){
            $this->reset(
                'dt_kelurahan',
                'dt_tps',
            );
        }else{
            $filterKelurahan = array_values((collect($this->temp_tps))
                ->where('kecamatan_id',$this->kecamatan_id)
                ->groupBy('kelurahan_id')
                ->toArray());
            foreach ($filterKelurahan as $key => $value) {
                $this->dt_kelurahan[$key]['id'] = $value[0]['kelurahans']['id'];
                $this->dt_kelurahan[$key]['nama_kelurahan'] = $value[0]['kelurahans']['nama_kelurahan'];
            }
        }
    }

    public function pickKelurahan()
    {
        $this->reset(
            'dt_tps',
        );
        if($this->kelurahan_id==0){
            $this->reset(
                'dt_tps',
            );
        }else{
            $filterTps = array_values((collect($this->temp_tps))
                ->where('kecamatan_id',$this->kecamatan_id)
                ->where('kelurahan_id',$this->kelurahan_id)
                ->toArray());
            foreach ($filterTps as $key => $value) {
                $this->dt_tps[$key]['id'] = $value['id'];
                $this->dt_tps[$key]['no_tps'] = $value['no_tps'];
            }
        }
    }

    public function pickTps()
    {

    }

    public function render()
    {
        return view('mods.auth.form_login');
    }
}
