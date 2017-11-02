<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamentoDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento_dados', function (Blueprint $table) {

            $table->increments('id');
            $table->text('descricao');
            $table->string('endereco', 300);
            $table->string('cliente', 300);
            $table->string('contrato', 150);
            $table->date('data_base');
            $table->float('bdi_1');
            $table->float('bdi_2');
            $table->float('bdi_3');
            $table->float('ls_hora');
            $table->float('ls_mes');
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
        Schema::dropIfExists('orcamento_dados');
    }
}
