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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->foreignId('id_factura')
                ->constrained('facturas', 'id_factura')
                ->restrictOnDelete();

            $table->foreignId('id_tarjeta')
                ->nullable()
                ->constrained('tarjetas', 'id_tarjeta')
                ->nullOnDelete();

            $table->decimal('monto', 10, 2);

            $table->enum('metodo_pago', [
                'efectivo',
                'tarjeta'
            ]);

            $table->enum('estado', [
                'pendiente',
                'completado',
                'cancelado',
                'rechazado'
            ])->default('completado');

            $table->string('referencia_transaccion', 100)->nullable();

            $table->dateTime('fecha_pago')->useCurrent();

            $table->string('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
