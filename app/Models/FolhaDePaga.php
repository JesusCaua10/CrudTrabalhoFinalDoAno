<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaDePaga extends Model
{
    use HasFactory;

    protected $table = 'folhadepaga';

    protected $fillable = [
        'funcionario_id',
        'data_pagamento',
        'salario_bruto',
        'descontos',
        'salario_liquido'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}