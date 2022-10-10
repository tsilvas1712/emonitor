<?php

namespace App\Http\Controllers\EMonitor;

use App\Http\Controllers\Controller;
use App\Models\Credor;
use Illuminate\Http\Request;

class OcorrenceController extends Controller
{
    //
    protected $credor;

    public function __construct(Credor $credor)
    {
        $this->credor = $credor;

    }

    public function index(){

        $credores = $this->credor->latest()->get();
        return view('Emonitor.ocorrencias',[
            "credores" => $credores
        ]);
    }

    public function credor($id)
    {
        $credor = $this->credor->where('id',$id)->first();

        $ocorrences = $credor->ocorrences;

        return view('Emonitor.credor',[
            "credor" => $credor,
            "ocorrences" => $ocorrences
        ]);

    }
}