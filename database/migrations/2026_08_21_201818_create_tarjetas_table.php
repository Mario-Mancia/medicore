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
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id('id_tarjeta');
            $table->foreignId('id_paciente')
                ->nullable()
                ->constrained('pacientes', 'id_paciente')
                ->nullOnDelete();

            $table->string('marca', 30);

            $table->char('ultimos_cuatro', 4);

            $table->enum('tipo', [
                'credito',
                'debito'
            ]);

            $table->string('token')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjetas');
    }
};
