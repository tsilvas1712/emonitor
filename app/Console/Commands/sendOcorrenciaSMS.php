<?php

namespace App\Console\Commands;

use App\Http\Controllers\EMonitor\AegeaController;
use App\Models\SQLSRV\Ocorrencia;
use Illuminate\Console\Command;

class sendOcorrenciaSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera Ocorrencias para Devedor SMS';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $Ocorrence = new Ocorrencia();
        $sendUra = new AegeaController($Ocorrence);

        $sendUra->sendOcorrenceSMS();
    }
}
