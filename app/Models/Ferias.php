<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ferias extends Model
{
    protected $table = 'ferias';

    protected $fillable = [
        'funcionario_id',
        'data_inicio',
        'data_fim',
        'dias',
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
