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
        Schema::create('registros_medicos', function (Blueprint $table) {
            $table->id('id_registro_medico');
            $table->foreignId('id_paciente')
                ->constrained('pacientes', 'id_paciente')
                ->restrictOnDelete();

            $table->foreignId('id_doctor')
                ->constrained('doctores', 'id_doctor')
                ->restrictOnDelete();

            $table->foreignId('id_cita')
                ->nullable()
                ->constrained('citas', 'id_cita')
                ->nullOnDelete();

            $table->dateTime('fecha_registro')->useCurrent();

            $table->text('motivo_consulta')->nullable();
            $table->text('notas_clinicas')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_medicos');
    }
};
