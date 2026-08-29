<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes_alergias', function (Blueprint $table) {
            $table->id('id_paciente_alergia');
            $table->foreignId('id_paciente')
                ->constrained('pacientes', 'id_paciente')
                ->cascadeOnDelete();

            $table->foreignId('id_alergia')
                ->constrained('alergias', 'id_alergia')
                ->restrictOnDelete();

            $table->enum('gravedad', [
                'leve',
                'moderada',
                'grave',
                'desconocida'
            ])->default('desconocida');

            $table->string('reaccion', 250)->nullable();
            $table->string('notas', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente_alergias');
    }
};
