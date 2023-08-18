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
        Schema::create('eventos_asisten', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('evento_id');
            $table->string('nombre',150);
            $table->string('email',200);
            $table->string('telefono',150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos_asisten');
    }
};
