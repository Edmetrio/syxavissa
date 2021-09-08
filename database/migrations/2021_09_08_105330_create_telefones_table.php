<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefone', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('perfil_id')->nullable();
            $table->foreign('perfil_id')->references('id')->on('perfil')->onDelete('cascade')->onUpdate('cascade');
            $table->string('operadora_id')->nullable();
            $table->foreign('operadora_id')->references('id')->on('operadora')->onDelete('cascade')->onUpdate('cascade');
            $table->string('numero')->nullable();
            $table->string('estado')->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefone');
    }
}
