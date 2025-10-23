<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'nome',
        'salario_base',
        'nivel_acesso'
    ];
}
