<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_c'); // Columna id_c (clave primaria)
            $table->string('nombre_c'); // Columna nombre_c
            $table->string('correo_c')->unique(); // Columna correo_c (único)
            $table->string('telefono_c')->nullable(); // Columna telefono_c
            $table->string('direccion_c')->nullable(); // Columna direccion_c
            $table->string('clave_c'); // Columna clave_c
            $table->timestamps(); // Agrega created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}