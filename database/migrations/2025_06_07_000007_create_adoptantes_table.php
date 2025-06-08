<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('adoptantes', function (Blueprint $table) {
    $table->id('id_adoptante');
    $table->string('nombres', 100);
    $table->string('telefono', 20)->nullable();
    $table->string('direccion', 100)->nullable();
    $table->integer('edad')->nullable();
    $table->string('correo', 100)->nullable();
    $table->enum('sexo', ['M', 'F', 'Otro'])->nullable();
    $table->unsignedBigInteger('id_tipo')->nullable();
    $table->unsignedBigInteger('id_localidad')->nullable();
    $table->unsignedBigInteger('id_barrio')->nullable();
    $table->enum('rol', ['adoptante', 'donante', 'ambos'])->default('adoptante');
    $table->timestamps();

    // Claves foráneas corregidas
    $table->foreign('id_tipo')
        ->references('id_tipo')->on('tipo_docum')
        ->onDelete('set null');

    $table->foreign('id_localidad')
        ->references('id_localidad')->on('localidad_usu')
        ->onDelete('set null');

    $table->foreign('id_barrio')
        ->references('id_barrio')->on('barrio')
        ->onDelete('set null');
});

}

    public function down(): void
    {
        Schema::dropIfExists('adoptantes');
    }
};
