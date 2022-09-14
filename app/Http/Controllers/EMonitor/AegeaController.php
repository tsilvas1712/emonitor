<?php

namespace App\Http\Controllers\EMonitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\SQLSRV\Ocorrencia;
use App\Jobs\SendOcorrence;
use App\Models\SQLSRV\Contrato;

class AegeaController extends Controller
{
    //
    private $repository;


    public function __construct(Ocorrencia $ocorrencia){
        $this->repository = $ocorrencia;
    }
    public function index(){
        $data = Carbon::now();
        //$top = rand(1950,2500);
        $top = 10;

        $contrato =Contrato::where('Cd_Credor',10072)->take(10)->get();



        $dtOcorrencias=$data->subDays(5)->format('Y-m-d');

        ddd($contrato);


        $ocorrences = DB::connection('sqlsrv')->select("select distinct top 10 tb.*,C.Cd_Telefone, C.Tp_Telefone, CTT.Cd_Contrato, CTT.Ds_UsoCliente, CTT.Cd_DevCre
        from Contrato ctt (nolock), DevedorTelefone C (nolock),
            (select Oco.Cd_Credor, Oco.Cd_Devedor, Oco.Cd_Historico, Oco.Cd_Negociador, Oco.MM_Texto,
                    max(Oco.Dt_Ocorrencia) Dt_Ocorrencia
             from Ocorrencia Oco (nolock)
             where (Oco.Cd_Credor in (10072))
             and (Oco.Dt_Ocorrencia <= '2022-09-08 23:59:59')
               and (Oco.Cd_Historico in (12,20, 1,2,3,4,5,6,7,8,9,10,11,13,14,15,17,19,22,32,33,34, 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,19,20,22,32,33,34, 4, 9,14))
             group by Oco.Cd_Credor, Oco.Cd_Devedor, Oco.Cd_Historico, Oco.Cd_Negociador, Oco.MM_Texto) tb
        where tb.Cd_Devedor = ctt.Cd_Devedor
          and tb.Cd_Credor = ctt.Cd_Credor
          and C.Cd_Devedor = ctt.Cd_Devedor
          and ctt.Cd_Credor in (10072)
          and len(C.Cd_Telefone) > 0
        order by tb.cd_devedor ");
        $countRegisters = $top;
        $countTelefoneMovel = 0;
        $countTelefoneFixo = 0;
        $countRepetidos = 0;




        foreach($ocorrences as $ocorrencia){
            $data = [];
            $data['Cd_Credor'] = $ocorrencia->Cd_Credor;
            $data['Cd_Devedor'] = $ocorrencia->Cd_Devedor;
            $data['Cd_Historico'] = $ocorrencia->Cd_Historico;
            $data['Cd_Negociador'] = $ocorrencia->Cd_Negociador;
            $data['MM_Texto'] = $ocorrencia->MM_Texto;
            $data['Dt_Ocorrencia'] = Carbon::now()->toDateTimeString();
            $data['Dt_Contato'] = $data['Dt_Ocorrencia'];


            if($ocorrencia->Tp_Telefone === 'M'){
                $data['MM_Texto'] = 'SMS - TESTE';
                $countTelefoneMovel++;
            }

            if($ocorrencia->Tp_Telefone === 'F'){
                $data['MM_Texto'] = 'URA - TESTE';
                $countTelefoneFixo++;
            }


            dispatch(new SendOcorrence($data))->delay(Carbon::now()->addSeconds(5));


            /*
            try {

            } catch (\Throwable $th) {
                $countRepetidos++;
            }*/




        }

        return  view('Emonitor.Aegea.index',[
            'ocorrences' => $ocorrences,
            'countRegisters'=> $countTelefoneFixo + $countTelefoneMovel ,
            'telefoneFixo'=> $countTelefoneFixo,
            'telefoneMovel'=> $countTelefoneMovel,
            'erros' => $countRepetidos,
        ]);



    }
}
