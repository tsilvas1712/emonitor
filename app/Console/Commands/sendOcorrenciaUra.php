<?php

namespace App\Console\Commands;

use App\Http\Controllers\EMonitor\AegeaController;
use App\Models\SQLSRV\Ocorrencia;
use Illuminate\Console\Command;

class sendOcorrenciaUra extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ura:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera Ocorrencias para Devedor Ura';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $Ocorrence = new Ocorrencia();
        $sendUra = new AegeaController($Ocorrence);

        $sendUra->sendOcorrenceUra();




    }
}