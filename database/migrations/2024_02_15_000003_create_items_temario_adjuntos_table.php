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
        Schema::create('items_temario_adjuntos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->float('size');
            $table->string('path');
            $table->string('title');
            $table->integer('id_temario');
            $table->timestamps();

    //        $table->foreign('id_orden_dia')->references('id')->on('ordenes_dia')->cascadeOnDelete();
    //        $table->foreign('id_tema')->references('id')->on('temas')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
   // public function down(): void
   // {
   //     Schema::dropIfExists('temarios_ordenes_dia');
   // }
};

