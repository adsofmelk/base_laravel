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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre1',45)->nullable(false);
            $table->string('nombre2',45);
            $table->string('apellido1',45)->nullable(false);
            $table->string('apellido2',45);
            $table->string('documento',45)->nullable(false);
            $table->string('telefono',20);
            $table->string('email',100);
            $table->boolean('estado')->nullable(false)->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('tipo_documentos_id')
                ->references('id')
                ->on('tipo_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
