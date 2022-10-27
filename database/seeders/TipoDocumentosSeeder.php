<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TipoDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert(
            [
                'nombre' => "Cedula Ciudadania",
                'alias' => "C.C.",
            ]
        );

        DB::table('tipo_documentos')->insert(
            [
                'nombre' => "Cedula Extranjeria",
                'alias' => "C.E.",
            ],
        );  

        DB::table('tipo_documentos')->insert(
            [
                'nombre' => "Tarjeta Identidad",
                'alias' => "T.I.",
            ]
        );

        DB::table('tipo_documentos')->insert(
            [
                'nombre' => "Registro Civil",
                'alias' => "R.C.",
            ],
        );  
    }
}
