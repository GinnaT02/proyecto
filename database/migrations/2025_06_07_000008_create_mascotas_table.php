<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id('id_mascota');
            $table->string('nombre');
            $table->integer('edad')->nullable();
            $table->boolean('vacunado')->default(false);
            $table->boolean('peligroso')->default(false);
            $table->boolean('esterilizado')->default(false);
            $table->string('genero', 10)->nullable();
            $table->unsignedBigInteger('raza_id')->nullable();
            $table->unsignedBigInteger('condicion_id')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->boolean('condiciones_especiales')->default(false);
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->timestamps();

            $table->foreign('raza_id')->references('id_raza')->on('raza')->onDelete('set null');
            $table->foreign('condicion_id')->references('id_condicion')->on('detalle_condicion')->onDelete('set null');
            $table->foreign('estado_id')->references('id_estado')->on('estado')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mascotas'); // ✅ corregido
    }
};
