<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GruposExamenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos_examenes')->insert(
            [
                'nombre' => "Medicina General",
                'color' => "green",
                'estado' => true,
            ]
        );

        DB::table('grupos_examenes')->insert(
            [
                'nombre' => "Fonoaudiología",
                'color' => "red",
                'estado' => true,
            ]
        );

        DB::table('grupos_examenes')->insert(
            [
                'nombre' => "Ecografías",
                'color' => "pink",
                'estado' => true,
            ]
        );

        DB::table('grupos_examenes')->insert(
            [
                'nombre' => "Medicina Laboral",
                'color' => "blue",
                'estado' => true,
            ]
        );
    }
}
