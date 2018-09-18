<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_info', function (Blueprint $table) {
            $table->increments('id_contact');
            $table->string('communication_tool', 45);
            $table->string('contact', 45);
            $table->integer('id_person');
            $table->string('comment')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
//            $table->foreign('id_person')->references('id_person')->on('person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_info');
    }
}
