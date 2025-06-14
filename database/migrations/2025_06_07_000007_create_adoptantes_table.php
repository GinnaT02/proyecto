<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('adoptantes', function (Blueprint $table) {
            $table->bigIncrements('id_adoptante');
            $table->string('nombres', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->integer('edad')->nullable();
            $table->integer('nro_docum');
            $table->string('correo', 100)->nullable();
            $table->string('sexo', 10)->nullable();
            $table->unsignedBigInteger('id_localidad');
            $table->unsignedBigInteger('barrio_viv');
            $table->enum('rol', ['adoptante', 'donante', 'ambos'])->default('adoptante');
            $table->timestamps();
            $table->foreign('tipo_docum')->references('id_tipo')->on('tipo_docum')->onDelete('restrict');
            $table->foreign('id_localidad')->references('id_localidad')->on('localidad_usu')->onDelete('restrict');
            $table->foreign('barrio_viv')->references('id_barrio')->on('barrio')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adoptantes');
    }
};
