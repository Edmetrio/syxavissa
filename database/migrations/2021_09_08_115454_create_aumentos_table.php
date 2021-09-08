<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aumento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('unidade_id')->nullable();
            $table->foreign('unidade_id')->references('id')->on('unidade')->onDelete('cascade')->onUpdate('cascade');
            $table->string('transacao_id')->nullable();
            $table->foreign('transacao_id')->references('id')->on('transacao')->onDelete('cascade')->onUpdate('cascade');
            $table->string('numerolote')->nullable();
            $table->decimal('custo', 20,2)->nullable();
            $table->decimal('quantidade', 20,2)->nullable();
            $table->string('estado')->default('on')->nullable();
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
        Schema::dropIfExists('aumento');
    }
}
