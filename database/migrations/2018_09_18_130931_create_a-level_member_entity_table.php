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
            $table->integer('id_person');
            $table->integer('id_position');
            $table->integer('id_direction');
            $table->integer('id_company');
            $table->text('comment')->nullable();
            $table->boolean('ASPT');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
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
