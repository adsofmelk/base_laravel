<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * artisan db:seed --class=AppSeeder
     * @return void
     */

    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            TipoDocumentosSeeder::class,
            GruposExamenesSeeder::class,
        ]);
    }
}
