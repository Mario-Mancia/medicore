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
        Schema::create('autenticacion_dos_factores', function (Blueprint $table) {
            $table->id('id_autenticacion');
            $table->foreignId('id_usuario')
                ->unique()
                ->constrained('usuarios', 'id_usuario')
                ->cascadeOnDelete();

            $table->string('secreto', 250);

            $table->boolean('habilitado')->default(false);

            $table->dateTime('verificado_en')->nullable();

            $table->json('codigos_recuperacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autenticacion_dos_factores');
    }
};
