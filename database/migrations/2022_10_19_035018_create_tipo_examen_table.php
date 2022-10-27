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
        Schema::create('tipo_examen', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)->nullable(false);
            $table->float('precio',8,2)->nullable(false);
            $table->boolean('estado')->nullable(false)->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('grupos_examenes_id')
                    ->references('id')
                    ->on('grupos_examenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_examen');
    }
};
