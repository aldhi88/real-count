<?php

namespace App\Livewire\Dashboard;

use App\Models\Calon;
use App\Models\Dapil;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rekap;
use App\Models\Tps;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $dtDap;
    public $dtKec;
    public $dtKel;
    public $dtTps;
    public $dtCalGolkar;
    public $dtCal;
    public $dtTotalSuara;
    public $dtTotalSuaraGolkar;

    public function mount()
    {
        $this->dtDap = Dapil::count();
        $this->dtKec = Kecamatan::count();
        $this->dtKel = Kelurahan::count();
        $this->dtTps = Tps::count();
        $this->dtCal = Calon::count();
        $this->dtCalGolkar = Calon::where('partai_id', 8)->count();
        $this->dtTotalSuara = Rekap::sum('jumlah');
        $this->dtTotalSuaraGolkar = Rekap::where('partai_id', 8)->sum('jumlah');
    }

    public function render()
    {
        return view('mods.dashboard.dashboard_admin',);
    }
}
