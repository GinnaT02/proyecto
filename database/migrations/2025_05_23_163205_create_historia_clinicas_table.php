<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('historia_clinicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rescatado_id');
            $table->date('fecha_chequeo');
            $table->float('peso');
            $table->text('tratamiento');
            $table->text('observaciones')->nullable();
            $table->text('cuidados')->nullable();
            $table->timestamps();
            $table->foreign('rescatado_id')->references('id')->on('rescatados')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('historia_clinicas');
    }
};