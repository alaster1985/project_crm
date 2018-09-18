<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_entity', function (Blueprint $table) {
            $table->increments('id_student');
            $table->enum('learning_status', ['Обучается', 'Выпустился', 'Отвалился', 'Other']);
            $table->enum('employment_status', ['Трудоустроен', 'В поиске', 'Не актуально в IT', 'Отказался', 'В IT не по направлению', 'Other']);
            $table->string('C.V.', 255);
            $table->text('comment');
            $table->integer('id_person');
            $table->integer('id_group');
            $table->integer('id_direction');
            $table->integer('id_member');
            $table->integer('id_company');
            $table->integer('id_position');
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
        Schema::dropIfExists('students_entity');
    }
}
