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
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->id('id_detalle_factura');
            $table->foreignId('id_factura')
                ->constrained('facturas', 'id_factura')
                ->cascadeOnDelete();

            $table->foreignId('id_servicio')
                ->constrained('servicios', 'id_servicio')
                ->restrictOnDelete();

            $table->string('descripcion')->nullable();

            $table->decimal('cantidad', 10, 2)->default(1);

            $table->decimal('precio_unitario', 10, 2);

            $table->decimal('subtotal', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_facturas');
    }
};
