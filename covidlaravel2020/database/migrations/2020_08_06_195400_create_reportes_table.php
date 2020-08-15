<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacientes_id');
            $table->foreign('pacientes_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->date('Fecha');
            $table->time('Hora');
            $table->integer('Temperatura');
            $table->integer('Saturacion_de_Oxigeno');
            $table->integer('Frecuencia_Cardiaca');
            $table->char('Estado', 100);
            $table->decimal('latitud',30,20);
            $table->decimal('longitud',30,20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
