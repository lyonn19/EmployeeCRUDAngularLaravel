<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades;
class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('employees', function (Blueprint $table) {

            $table->string('doc_id');
            $table->string('apellidos');
            $table->string('telefono_principal');
            $table->string('celular');
            $table->string('email');
            $table->string('nombres');
            $table->string('telefono_secundario');
            $table->string('direccion');
            $table->string('foto');
            $table->integer('idcargo');
            $table->foreign('idcargo')->references('idcargo')->on('cargos');
            $table->timestamp();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('employees');

    }
}




