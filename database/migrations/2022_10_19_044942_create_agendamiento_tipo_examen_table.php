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
        Schema::create('agendamiento_tipo_examen', function (Blueprint $table) {
            $table->id();
            $table->float('precio',8,2)->nullable(false);
            $table->boolean('estado')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('tipo_examen_id')
                ->references('id')
                ->on('tipo_examen');

            $table->foreignId('agendamiento_id')
                ->references('id')
                ->on('agendamiento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamiento_tipo_examen');
    }
};
