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
        Schema::create('localidades', function (Blueprint $table) {
            $table->id();   //->primary()
            $table->string('nombre',255)->nullable();
            $table->integer('provincia_id')->nullable();
            $table->string('provincia_nombre',255)->nullable();
            $table->string('categoria',255)->nullable();
            $table->decimal('centroide_lat',15,4)->nullable();
            $table->decimal('centroide_lon',15,4)->nullable();
            $table->decimal('departamento_id',15,4)->nullable();
            $table->string('departamento_nombre',255)->nullable();
            $table->string('fuente',255)->nullable();
            $table->decimal('id2',15,4)->nullable();
            $table->decimal('localidad_censal_id',15,4)->nullable();
            $table->string('localidad_censal_nombre',255)->nullable();
            $table->decimal('municipio_id',15,4)->nullable();
            $table->string('municipio_nombre',255)->nullable();
            $table->tinyInteger('estado')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localidades');
    }
};
