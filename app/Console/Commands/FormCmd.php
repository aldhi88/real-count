<?php

namespace App\Console\Commands;

use App\Models\Calon;
use App\Models\Rekap;
use App\Models\Tps;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FormCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rekap';

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
        $dtCalon = Calon::select()  
            ->with([
                'partais',
                'dapils',
            ])
            ->get()
            ->toArray();
        // dd($dtCalon[0]);
        foreach ($dtCalon as $iDtCalon => $vDtCalon) {
            
            
            $dtTps = Tps::where('dapil_id',$vDtCalon['dapil_id'])
                ->get()
                ->toArray();
            
            foreach ($dtTps as $iDtTps => $vDtTps) {

                $dt[$iDtTps]['calon_id'] = $vDtCalon['id'];
                $dt[$iDtTps]['partai_id'] = $vDtCalon['partai_id'];
                $dt[$iDtTps]['dapil_id'] = $vDtCalon['dapil_id'];

                $dt[$iDtTps]['kecamatan_id'] = $vDtTps['kecamatan_id'];
                $dt[$iDtTps]['kelurahan_id'] = $vDtTps['kelurahan_id'];
                $dt[$iDtTps]['tps_id'] = $vDtTps['id'];

                $dt[$iDtTps]['created_at'] = Carbon::now();
                $dt[$iDtTps]['updated_at'] = Carbon::now();


            }

            Rekap::insert($dt);
            unset($dt);
            echo "Calon ID ".$vDtCalon['id']." (ok)\n";

        }
        echo "Data rekap ok\n";
    }
}
