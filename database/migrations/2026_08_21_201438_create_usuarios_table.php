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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->foreignId('id_rol')
                ->constrained('roles', 'id_rol')
                ->restrictOnDelete();

            $table->foreignId('id_estado')
                ->constrained('estados', 'id_estado')
                ->restrictOnDelete();

            $table->string('nombres', 100);
            $table->string('apellidos', 100);

            $table->string('correo', 150)->unique();

            $table->string('contrasenha', 250);

            $table->string('telefono', 25)->nullable();

            $table->rememberToken();

            $table->dateTime('ultimo_inicio_sesion')->nullable();
            $table->ipAddress('ultima_ip_inicio_sesion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
