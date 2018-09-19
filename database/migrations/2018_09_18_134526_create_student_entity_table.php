<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStudentEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_entity', function (Blueprint $table) {
            $table->increments('id_student');
            $table->enum('learning_status', ['learning', 'graduated', 'fell_of', 'Other']);
            $table->enum('employment_status', ['employed', 'in_search', 'not_relevant_in_IT', 'refused', 'in_IT_not_in_direction', 'Other']);
            $table->string('CV', 255)->nullable();
            $table->text('comment')->nullable();
            $table->integer('id_person')->unsigned();
            $table->integer('id_group')->unsigned();
            $table->integer('id_member')->nullable()->unsigned();
            $table->integer('id_company')->nullable()->unsigned();
            $table->integer('id_position')->nullable()->unsigned();
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
        Schema::dropIfExists('students_entity');
    }
}
