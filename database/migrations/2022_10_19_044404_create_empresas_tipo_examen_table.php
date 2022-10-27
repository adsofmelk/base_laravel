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
        Schema::create('empresas_tipo_examen', function (Blueprint $table) {
            $table->id();
            $table->float('porcentaje_descuento',8,2);
            $table->float('precio_empresa',8,2);
            $table->timestamps();
            $table->softDeletes();


            $table->foreignId('empresas_id')
                ->references('id')
                ->on('empresas');


            $table->foreignId('tipo_examen_id')
                ->references('id')
                ->on('tipo_examen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas_tipo_examen');
    }
};
