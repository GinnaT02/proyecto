<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('detalle_donacion', function (Blueprint $table) {
        $table->id('id_detalle');
        $table->unsignedBigInteger('id_donacion');
        $table->string('descripcion_producto');
        $table->integer('cantidad');
        $table->unsignedBigInteger('presentacion_id');
        $table->timestamps();
        $table->foreign('id_donacion')->references('id_donacion')->on('donaciones')->onDelete('cascade');
        $table->foreign('presentacion_id')->references('id_presentac')->on('presentacion')->onDelete('restrict');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_donacion');
    }
};
