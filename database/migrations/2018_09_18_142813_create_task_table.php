<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->increments('id_task');
            $table->string('task_name', 45);
            $table->text('description');
            $table->dateTime('dead_line');
            $table->integer('id_member_customer')->unsigned();
            $table->integer('id_member_doer')->unsigned();
            $table->text('doers_report');
            $table->boolean('task_completed');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->foreign('id_member_customer')->references('id_member')->on('ALevelMemberEntityTable');
            $table->foreign('id_member_doer')->references('id_member')->on('ALevelMemberEntityTable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
