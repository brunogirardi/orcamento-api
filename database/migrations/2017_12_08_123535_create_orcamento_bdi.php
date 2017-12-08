<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamentoBdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento_bdi', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('orcamento_dados_id')->unsigned();
            $table->text('descricao');
            $table->float('valor');
            $table->timestamps();

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
        Schema::dropIfExists('orcamento_bdi');
    }
}
