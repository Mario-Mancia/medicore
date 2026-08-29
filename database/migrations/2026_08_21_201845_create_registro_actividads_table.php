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
        Schema::create('registro_actividads', function (Blueprint $table) {
            $table->id('id_registro_actividad');
            $table->foreignId('id_usuario')
                ->nullable()
                ->constrained('usuarios', 'id_usuario')
                ->nullOnDelete();

            $table->string('accion', 100);

            $table->string('descripcion')->nullable();

            $table->string('tipo_entidad', 100)->nullable();

            $table->unsignedBigInteger('entidad_id')->nullable();

            $table->ipAddress('direccion_ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_actividads');
    }
};
