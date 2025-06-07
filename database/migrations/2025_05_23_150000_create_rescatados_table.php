<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rescatados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('edad')->nullable();
            $table->text('descripcion_rescate')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->boolean('condiciones_especiales')->default(false);
            $table->string('sexo');
            $table->string('estado')->default('Disponible');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rescatados');
    }
};
