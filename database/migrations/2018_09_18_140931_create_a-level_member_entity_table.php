<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateALevelMemberEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ALevelMemberEntityTable', function (Blueprint $table) {
            $table->increments('id_member');
            $table->integer('id_person')->unsigned();
            $table->integer('id_position')->nullable()->unsigned();
            $table->integer('id_direction')->nullable()->unsigned();
            $table->integer('id_company')->nullable()->unsigned();
            $table->text('comment')->nullable();
            $table->boolean('ASPT');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->foreign('id_person')->references('id_person')->on('person');
            $table->foreign('id_position')->references('id_position')->on('position');
            $table->foreign('id_direction')->references('id_direction')->on('direction');;
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
        //
    }
}
