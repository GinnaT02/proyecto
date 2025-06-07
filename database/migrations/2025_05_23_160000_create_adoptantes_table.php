<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('adoptantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('edad')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('rescatado_id')->nullable(); // FK nullable para que no rompa
            $table->timestamps();

            $table->foreign('rescatado_id')->references('id')->on('rescatados')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adoptantes');
    }
};
