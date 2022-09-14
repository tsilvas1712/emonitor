<?php

namespace App\Models\SQLSRV;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $table = 'Contrato';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = ['Cd_Credor','Cd_DevCre','Cd_Contrato','Nr_Parcela','Dt_Vencimento'];


}
