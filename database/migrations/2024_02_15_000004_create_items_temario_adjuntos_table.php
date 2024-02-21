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
            $table->unsignedBigInteger('id_item_temario');
            $table->string('name');
            $table->string('type');
            $table->float('size');
            $table->string('path');
            $table->string('title');
            $table->timestamps();

            $table->foreign('id_item_temario')->references('id')->on('items_temario')->cascadeOnDelete();

    //        $table->foreign('id_orden_dia')->references('id')->on('ordenes_dia')->cascadeOnDelete();
    //        $table->foreign('id_tema')->references('id')->on('temas')->restrictOnDelete();
        });
    }

};

