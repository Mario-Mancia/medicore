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
        Schema::create('pacientes_condiciones', function (Blueprint $table) {
            $table->id('id_paciente_condicion');
            $table->foreignId('id_paciente')
                ->constrained('pacientes', 'id_paciente')
                ->cascadeOnDelete();

            $table->foreignId('id_condicion_medica')
                ->constrained('condiciones_medicas', 'id_condicion_medica')
                ->restrictOnDelete();

            $table->date('fecha_diagnostico')->nullable();

            $table->string('notas', 250)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente_condicions');
    }
};
