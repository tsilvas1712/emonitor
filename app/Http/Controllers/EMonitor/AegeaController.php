<?php

namespace App\Http\Controllers\EMonitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AegeaController extends Controller
{
    //
    public function index(){
        $ocorrences = DB::connection('sqlsrv')->select('select * from Credor');



    }
}
