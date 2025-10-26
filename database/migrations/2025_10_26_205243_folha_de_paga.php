<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folhadepaga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcionario_id')->constrained('funcionarios')->onDelete('cascade');
            $table->decimal('salario_bruto', 10, 2);
            $table->decimal('descontos', 10, 2);
            $table->decimal('salario_liquido', 10, 2);
            $table->date('data_pagamento');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folhadepaga');
    }
};