<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'cargo_id',
        'salario'
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}