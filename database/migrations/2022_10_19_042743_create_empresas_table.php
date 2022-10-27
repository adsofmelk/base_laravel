<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)->unique()->nullable(false);
            $table->string('nit',15)->unique()->nullable(false);
            $table->string('telefono',20)->nullable(false);
            $table->string('email',100)->nullable(false);
            $table->string('nombre_contacto',100);
            $table->string('direccion',255);
            $table->boolean('estado')->nullable(false)->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
