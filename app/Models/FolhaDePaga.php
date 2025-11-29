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
        'salario_liquido',
    ];

    // Relação com funcionário
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    // Evento antes de criar o registro
    protected static function booted()
    {
        static::creating(function ($folha) {
            $folha->salario_liquido = $folha->salario_bruto - $folha->descontos;
        });

        static::updating(function ($folha) {
            $folha->salario_liquido = $folha->salario_bruto - $folha->descontos;
        });
    }
}
