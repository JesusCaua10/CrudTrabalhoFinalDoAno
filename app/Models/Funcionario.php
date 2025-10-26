<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cargo_id',
        'data_admissao',
    ];

    // Um funcionário pertence a um cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    // Um funcionário pode ter várias folhas de pagamento
    public function folhas()
    {
        return $this->hasMany(FolhaDePaga::class, 'funcionario_id');
    }
}