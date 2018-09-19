<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->text('logo')->nullable();
            $table->text('comment')->nullable();
            $table->integer('id_contact_person')->unsigned();
            $table->integer('id_student')->unsigned();
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
        Schema::dropIfExists('it_company');
    }
}
