<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produtos', function (Blueprint $table) {
            $table->id('id_produto');
            $table->foreignId('id_categoria_produto')->references('id_categoria_planejamento')->on('tb_categoria_produtos');
            $table->dateTime('data_cadastro');
            $table->string('nome_produto');
            $table->float('valor_produto');
            $table->index(['id_produto', 'id_categoria_produto']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produtos');
    }
}
