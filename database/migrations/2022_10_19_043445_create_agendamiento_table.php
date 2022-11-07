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
        Schema::create('agendamiento', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->timestamps();
            $table->softDeletes();


            $table->foreignId('pacientes_id')
                ->references('id')
                ->on('pacientes');


            $table->foreignId('empresas_id')
                ->references('id')
                ->on('empresas');


            $table->foreignId('tipoestados_agendamientos_id')
                ->references('id')
                ->on('tipoestados_agendamientos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamiento');
    }
};
