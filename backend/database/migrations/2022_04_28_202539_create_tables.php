<?php

use Hamcrest\Description;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->double('valor', 8, 2);
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('email')->unique();
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_pedido')->unique();
            $table->foreignId('fk_produto_id')->nullable();
            $table->foreignId('fk_usuario_id')->nullable();
            $table->timestamps();
            $table->foreign('fk_produto_id')->references('id')->on('produtos');
            $table->foreign('fk_usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('produtos');
        Schema::dropIfExists('usuarios');
    }
}
