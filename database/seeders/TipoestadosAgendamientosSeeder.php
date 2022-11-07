<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TipoestadosAgendamientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoestados_agendamientos')->insert(
            [
                'nombre' => "Agendado",
                'estado' => true,
            ]
        );

        DB::table('tipoestados_agendamientos')->insert(
            [
                'nombre' => "En proceso",
                'estado' => true,
            ]
        );

        DB::table('tipoestados_agendamientos')->insert(
            [
                'nombre' => "Finalizado",
                'estado' => true,
            ]
        );

        DB::table('tipoestados_agendamientos')->insert(
            [
                'nombre' => "No Agendado",
                'estado' => true,
            ]
        );

        DB::table('tipoestados_agendamientos')->insert(
            [
                'nombre' => "Cancelado por la empresa",
                'estado' => true,
            ]
        );


        DB::table('tipoestados_agendamientos')->insert(
            [
                'nombre' => "No asistió",
                'estado' => true,
            ]
        );
    }
}
