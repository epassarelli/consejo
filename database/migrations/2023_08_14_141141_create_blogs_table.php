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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tipoblog_id');
            $table->text('titulo');
            $table->string('subtitulo',100);
            $table->string('volanta',100);
            $table->text('contenido');
            $table->string('imagen',200);
            $table->text('link');
            $table->tinyInteger('publicado')->default(0);
            $table->bigInteger('usuario_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
