<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pacientes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pacientes')->insert([
            'nombres' => 'Carlos',
            'apellidos' => 'Martínez López',
            'fecha_nacimiento' => '1998-04-15',
            'genero' => 'masculino',
            'id_tipo_sanguineo' => 1,
            'numero_identificacion' => '0123456789',
            'telefono' => '7012-3456',
            'correo' => 'carlos.martinez@example.com',
            'direccion' => 'Colonia El Palmar, Santa Ana',
            'nombre_contacto_emergencia' => 'María López',
            'telefono_contacto_emergencia' => '7123-4567',
            'parentesco_contacto_emergencia' => 'Madre',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    //Cuando estemos listos, debemos darle: php artisan db:seed --class=pacientes
}
