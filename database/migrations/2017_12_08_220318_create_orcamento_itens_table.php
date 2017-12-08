<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamentoItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento_itens', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('orcamento_dados_id')->unsigned();
            $table->integer('sequencia')->unsigned();
            $table->string('itemizacao')->nullable();
            $table->integer('insumos_id')->unsigned()->nullable();
            $table->text('descricao')->nullable();
            $table->float('quantidade')->nullable();
            $table->integer('bdi_id')->nullable();
            $table->timestamps();

            $table->foreign('insumos_id')->references('id')->on('insumos');
            $table->foreign('orcamento_dados_id')->references('id')->on('orcamento_dados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamento_itens');
    }
}
