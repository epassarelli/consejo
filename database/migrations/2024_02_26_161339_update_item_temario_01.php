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
        Schema::table('items_temario', function (Blueprint $table) {
            $table->unsignedBigInteger('id_votacion')->nullable();
            $table->unsignedBigInteger('id_temario');
            
            $table->foreign('id_votacion')->references('id')->on('votaciones');
            $table->foreign('id_temario')->references('id')->on('temarios_ordenes_dia');
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
