<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('adopciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rescatado_id')->constrained('rescatados')->onDelete('cascade');
            $table->foreignId('adoptante_id')->constrained('adoptantes')->onDelete('cascade');
            $table->date('fecha_adopcion')->nullable();
            $table->string('estado')->default('En proceso');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adopciones');
    }
};
