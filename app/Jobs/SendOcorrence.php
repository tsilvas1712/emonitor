<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\SQLSRV\Ocorrencia;
use Carbon\Carbon;

class SendOcorrence implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $ocorrencia;
    public $respository;



    public function __construct( $ocorrencia)
    {

        $this->ocorrencia =$ocorrencia;

        $data = $this->ocorrencia;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ocorrencia = new Ocorrencia;
        $data = $this->ocorrencia;

        $ocorrencia->Cd_Credor = $data['Cd_Credor'];
        $ocorrencia->Cd_Devedor = $data['Cd_Devedor'];
        $ocorrencia->Cd_Historico = $data['Cd_Historico'];
        $ocorrencia->Cd_Negociador = $data['Cd_Negociador'];
        $ocorrencia->MM_Texto = $data['MM_Texto'];
        $ocorrencia->Dt_Ocorrencia = Carbon::now()->toDateTimeString();
        $ocorrencia->Dt_Contato = Carbon::now()->toDateTimeString();

        try {
            $ocorrencia->save();
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function failed(Exception $exception)
    {
        // usually would send new notification to admin/user
        info($exception);
    }
}
