<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaDePaga extends Model
{
    use HasFactory;

    protected $table = 'folhadepaga'; // deve ser o mesmo nome da tabela no BD

    protected $fillable = [
        'funcionario_id',
        'salario_bruto',
        'descontos',
        'salario_liquido',
        'data_pagamento'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}