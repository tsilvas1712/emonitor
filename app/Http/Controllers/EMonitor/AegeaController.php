<?php

namespace App\Http\Controllers\EMonitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AegeaController extends Controller
{
    //
    public function index(){
        $dtOcorrencias='2022-08-01';
        $ocorrences = DB::connection('sqlsrv')->select("select distinct tb.*, CTT.Cd_Contrato, CTT.Ds_UsoCliente, CTT.Cd_DevCre
        from Contrato ctt (nolock), DevedorTelefone C (nolock),
            (select Oco.Cd_Credor, Oco.Cd_Devedor, Oco.Cd_Historico, Oco.Cd_Negociador, Oco.MM_Texto,
                    max(Oco.Dt_Ocorrencia) Dt_Ocorrencia
             from Ocorrencia Oco (nolock)
             where (Oco.Cd_Credor in (10072))
             and (Oco.Dt_Ocorrencia >= '".$dtOcorrencias. " 00:00:00')
             and (Oco.Dt_Ocorrencia < '".$dtOcorrencias." 23:59:59')
               and (Oco.Cd_Historico in (12,20, 1,2,3,4,5,6,7,8,9,10,11,13,14,15,17,19,22,32,33,34, 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,19,20,22,32,33,34, 4, 9,14))
             group by Oco.Cd_Credor, Oco.Cd_Devedor, Oco.Cd_Historico, Oco.Cd_Negociador, Oco.MM_Texto) tb
        where tb.Cd_Devedor = ctt.Cd_Devedor
          and tb.Cd_Credor = ctt.Cd_Credor
          and C.Cd_Devedor = ctt.Cd_Devedor
          and ctt.Cd_Credor in (10072)
          and len(C.Cd_Telefone) > 0
        order by tb.cd_devedor ");

        return  view('Emonitor.Aegea.index',compact('ocorrences'));



    }
}
