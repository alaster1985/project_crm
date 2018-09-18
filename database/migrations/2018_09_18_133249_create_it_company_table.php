<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('it_company', function (Blueprint $table) {
            $table->increments('id_company');
            $table->string('company_name', 45);
            $table->enum('status', ['Партнеры', 'Ведется диалог', 'Потенциальные', 'Неотслеживаемые']);
            $table->enum('type', ['Трудоустройство', 'Информационное', 'партнерство', 'Проведение мероприятий', 'Отсутствует']);
            $table->string('site', 255);
            $table->string('address', 45);
            $table->text('logo');
            $table->text('comment');
            $table->integer('id_contact_person');
            $table->integer('id_student');
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
        Schema::dropIfExists('it_company');
    }
}
