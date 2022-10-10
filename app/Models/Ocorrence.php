<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrence extends Model
{
    use HasFactory;

    protected $fillable = ['credor_id','devedores','tipo','contador'];
}