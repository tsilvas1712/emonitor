<?php

namespace App\Models\SQLSRV;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $table = 'Ocorrencia';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = ['Cd_Devedor','Dt_Ocorrencia'];

    public $fillable = ['Cd_Devedor','Dt_Ocorrencia','Cd_Credor','Cd_Historico',
                                'Dt_Contato','MM_Texto','Cd_Negociador',];


}
