<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credor extends Model
{
    use HasFactory;

    protected $table = 'credores';

    public function ocorrences(){
        return $this->hasMany(Ocorrence::class)->latest();
    }
}