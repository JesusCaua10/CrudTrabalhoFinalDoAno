<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ferias extends Model
{
    use HasFactory;

    protected $fillable = [
        'funcionario_id',
        'data_inicio',
        'data_fim',
        'status',
        'dias',
    ];

    protected static function booted()
    {
        static::creating(function ($ferias) {
            $ferias->dias = Carbon::parse($ferias->data_inicio)
                ->diffInDays(Carbon::parse($ferias->data_fim)) + 1;
        });

        static::updating(function ($ferias) {
            $ferias->dias = Carbon::parse($ferias->data_inicio)
                ->diffInDays(Carbon::parse($ferias->data_fim)) + 1;
        });
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
