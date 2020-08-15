<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asignados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->foreignId('tablaqr_id')->constrained('TablaQR')->onDelete('cascade');
            $table->foreignId('pacientes_id')->constrained('pacientes')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignados');
    }
}
