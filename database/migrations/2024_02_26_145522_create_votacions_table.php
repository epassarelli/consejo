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
        Schema::create('votaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_temario');
            $table->string('titulo')->unique();
            $table->tinyInteger('estado')->default(1); # 1 edicion | 2 activo | 3 cerrada
            $table->enum('aceptacion', ["mayoria","2/3","absoluto"])->default("mayoria");
            $table->timestamps();

            $table->foreign('id_temario')->references('id')->on('temarios_ordenes_dia')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votacions');
    }
};
