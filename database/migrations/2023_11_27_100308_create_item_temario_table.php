<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items_temario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('temario_id');
            $table->unsignedBigInteger('comision_id');
            $table->foreign('comision_id')->references('id')->on('comisiones')->restrictOnDelete();
            $table->unsignedBigInteger('facultad_id');
            $table->foreign('facultad_id')->references('id')->on('facultades')->restrictOnDelete();
            $table->enum('tipo', ['EXPEDIENTE', 'NOTA']);
            $table->string('numero')->nullable(false);
            $table->string('resolucion')->nullable(false);
            $table->longText('resumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_temario');
    }
};
