<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCpuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('insumos_item_id')->unsigned();
            $table->integer('insumos_cpu_id')->unsigned();
            $table->float('coeficiente');
            $table->timestamps();

            $table->foreign('insumos_item_id')->references('id')->on('insumos');
            $table->foreign('insumos_cpu_id')->references('id')->on('insumos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpu_items');
    }
}
