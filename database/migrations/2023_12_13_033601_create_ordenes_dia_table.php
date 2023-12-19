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
        Schema::create('ordenes_dia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sesion');
            $table->unsignedBigInteger('id_estado')->default(1);
            $table->timestamps();

            //$table->foreign('id_sesion')->references('id')->on('sesiones')->onDelete('cascade');
            $table->foreign('id_sesion')->references('id')->on('sesiones');
            $table->foreign('id_estado')->references('id')->on('estados_orden_dia')->restrictOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_dia');
    }
};
