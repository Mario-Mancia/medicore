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
        Schema::create('intento_inicio_sesions', function (Blueprint $table) {
            $table->id('id_intento');
            $table->foreignId('id_usuario')
                ->nullable()
                ->constrained('usuarios', 'id_usuario')
                ->nullOnDelete();

            $table->string('correo_electronico', 150);

            $table->ipAddress('direccion_ip')->nullable();

            $table->text('agente_usuario')->nullable();

            $table->boolean('exitoso')->default(false);

            $table->string('motivo_fallo', 100)->nullable();

            $table->dateTime('fecha_intento')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intento_inicio_sesions');
    }
};
