<?php

namespace App\Console\Commands;

use App\Models\Tps;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SeedCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::query()->forceDelete();
        $dt = [
            [
                'id'=>1,
                'username'=>'superuser', 
                'nama'=>'Superuser', 
                'password'=>Hash::make('rahasia'), 
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=>2,
                'username'=>'partai', 
                'nama'=>'Admin Partai', 
                'password'=>Hash::make('rahasia'), 
                'created_at'=>Carbon::now(), 
                'updated_at'=>Carbon::now()
            ],
        ];

        User::insert($dt);
        unset($dt);

        $tps = Tps::select([
                'tps.id',
                'tps.dapil_id',
                'tps.kecamatan_id',
                'tps.kelurahan_id',
                'tps.no_tps',
            ])
            ->with([
                'kecamatans'=>function(Builder $q){
                    $q->select('id','nama_kecamatan');
                },
                'kelurahans'=>function(Builder $q){
                    $q->select('id','nama_kelurahan');
                },
            ])
            ->get()
            ->toArray();
        
        $id = 3;
        foreach ($tps as $key => $value) {
            $kec = str_replace(' ', '', $value['kecamatans']['nama_kecamatan']);
            $kec = strtolower($kec);

            $kel = str_replace(' ', '', $value['kelurahans']['nama_kelurahan']);
            $kel = strtolower($kel);

            $dt[$key]['id'] = $id+$key;
            $dt[$key]['tps_id'] = $value['id'];
            $dt[$key]['username'] = 'dapil'.$value['dapil_id'].$kec;
            $dt[$key]['password'] = $kel.$value['no_tps'].'_'.Str::random(5);
            $dt[$key]['nama'] = 'Saksi '.$value['id'];
            $dt[$key]['created_at'] = Carbon::now();
            $dt[$key]['updated_at'] = Carbon::now();

            echo $dt[$key]['nama']. "..dipersiapkan..\n";
        }
        User::insert($dt);
        echo "Users data has been generated\n";
    }
}
