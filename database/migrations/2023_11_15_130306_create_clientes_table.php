<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('identificacion')->nullable();
            $table->enum('tipo_ident', ['RUC', 'CÉDULA', 'PASAPORTE', 'CONSUMIDOR FINAL']);
            $table->text('razon_social');
            $table->text('nombre_comercial')->nullable();
            $table->text('email')->nullable();
            $table->text('telefono')->nullable();
            $table->text('ciudad')->nullable();
            $table->string('direccion')->nullable();
            $table->enum('estado',['Habilitado','Deshabilitado'])->default("Habilitado");
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
        Schema::dropIfExists('clientes');
    }
}
