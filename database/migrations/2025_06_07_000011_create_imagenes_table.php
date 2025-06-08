<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id('id_imagen');
            $table->unsignedBigInteger('id_mascota'); // 👈 debe coincidir con la PK de mascotas
            $table->string('ruta_imagen');
            $table->timestamps();

            $table->foreign('id_mascota')
                ->references('id_mascota') // 👈 nombre exacto de la PK
                ->on('mascotas') // 👈 nombre exacto de la tabla
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
