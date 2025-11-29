<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('ferias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcionario_id')->constrained()->onDelete('cascade');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('dias');
            $table->enum('status', ['Pendente', 'Aprovada', 'Rejeitada'])->default('Pendente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ferias');
    }
};
