<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStackPivotTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stack_pivot_table', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment')->nullable();
            $table->integer('id_stack')->unsigned();
            $table->integer('id_company')->unsigned();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->foreign('id_stack')->references('id_stack')->on('stack_of_technologies');
            $table->foreign('id_company')->references('id_company')->on('it_company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stack_pivot_table');
    }
}
