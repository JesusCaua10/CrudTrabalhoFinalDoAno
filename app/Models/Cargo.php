<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    // Nome da tabela (opcional se usar convenção)
    protected $table = 'cargos';

    // Campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'nome',
        'salario_base',
        'nivel_acesso',
    ];

    // Um cargo pode ter muitos funcionários
    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'cargo_id');
    }
}