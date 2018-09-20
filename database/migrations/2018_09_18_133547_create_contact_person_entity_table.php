<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateContactPersonEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_person_entity', function (Blueprint $table) {
            $table->increments('id_contact_person');
            $table->text('comment')->nullable();
            $table->integer('id_person')->unsigned();
            $table->integer('id_position')->nullable()->unsigned();
            $table->integer('id_direction')->nullable()->unsigned();
            $table->integer('id_company')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_person_entity');
    }
}
