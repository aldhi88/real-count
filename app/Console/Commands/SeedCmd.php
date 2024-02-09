<?php

namespace App\Console\Commands;

use App\Models\Tps;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

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

        $tps = Tps::all()->toArray();
        
        $id = 3;
        foreach ($tps as $key => $value) {
            $dt['id'] = $id+$key;
            $dt['tps_id'] = $value['id'];
            $dt['username'] = 'saksi'.$value['id'];
            $dt['password'] = Hash::make('rahasia');
            $dt['nama'] = 'Saksi '.$value['id'];
            User::create($dt);
            unset($dt);
            echo "Data ke-". ($key+1) .' (ok)'."\n";
        }
        echo "Users data has been generated\n";
    }
}
