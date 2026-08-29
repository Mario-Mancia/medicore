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
        Schema::create('doctores', function (Blueprint $table) {
            $table->id('id_doctor');
            $table->foreignId('id_usuario')
                ->constrained('usuarios', 'id_usuario')
                ->restrictOnDelete();

            $table->foreignId('id_especialidad')
                ->constrained('especialidades', 'id_especialidad')
                ->restrictOnDelete();

            $table->string('numero_licencia', 50)->unique();

            $table->text('descripcion_profesional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
