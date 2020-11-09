<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_nombre');
            $table->string('p_apellido_p');
            $table->string('p_apellido_m');
            $table->string('p_celular');
            $table->string('p_fijo');
            $table->string('p_correo');
            $table->unsignedBigInteger('p_id_colonia');
            $table->string('p_calle_p');
            $table->string('p_calle_1');
            $table->string('p_calle_2');
            $table->string('p_numero_e');
            $table->string('p_referencias');
            $table->string('s_descripcion');
            $table->unsignedBigInteger('s_tipo');
            $table->unsignedBigInteger('s_id_servicio');
            $table->unsignedBigInteger('s_id_prioridad');
            $table->unsignedBigInteger('b_solicitante');
            $table->string('b_nombre');
            $table->string('b_apellido_p');
            $table->string('b_apellido_m');
            $table->string('b_celular');
            $table->string('b_fijo');
            $table->string('b_correo');
            $table->unsignedBigInteger('s_id_colonia');
            $table->string('s_calle_p');
            $table->string('s_calle_1');
            $table->string('s_calle_2');
            $table->string('s_numero_e');
            $table->string('s_referencias');
            $table->foreign('p_id_colonia')->references('id')->on('colonias')->onDelete('cascade');
            $table->foreign('s_id_servicio')->references('id')->on('servicios')->onDelete('cascade');
            $table->foreign('s_id_prioridad')->references('id')->on('prioridades')->onDelete('cascade');
            $table->foreign('s_id_colonia')->references('id')->on('colonias')->onDelete('cascade');
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
        Schema::dropIfExists('solicitudes');
    }
}
