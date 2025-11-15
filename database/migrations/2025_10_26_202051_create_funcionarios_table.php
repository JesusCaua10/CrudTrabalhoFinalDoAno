<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->string('email', 100)->unique();
            $table->decimal('salario', 10, 2)->nullable();
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->date('data_admissao')->nullable();
            $table->timestamps();

            // Chave estrangeira para cargos
            $table->foreign('cargo_id')
                  ->references('id')
                  ->on('cargos')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};