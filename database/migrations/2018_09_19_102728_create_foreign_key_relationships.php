<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('it_company', function (Blueprint $table) {
//            $table->foreign('id_contact_person')->references('id_contact_person')->on('contact_person_entity');
//            $table->foreign('id_student')->references('id_student')->on('students_entity');
//        });
//        Schema::table('contact_info', function (Blueprint $table) {
//            $table->foreign('id_person')->references('id_person')->on('person');
//        });
//        Schema::table('students_entity', function (Blueprint $table) {
//            $table->foreign('id_person')->references('id_person')->on('person');
//            $table->foreign('id_group')->references('id_group')->on('group');
//            $table->foreign('id_member')->references('id_member')->on('alevel_member_entity');
//            $table->foreign('id_company')->references('id_company')->on('it_company');
//            $table->foreign('id_position')->references('id_position')->on('position');
//        });
//        Schema::table('skill_pivot_table', function (Blueprint $table) {
//            $table->foreign('id_skill')->references('id_skill')->on('skill');
//            $table->foreign('id_person')->references('id_person')->on('person');
//        });
//        Schema::table('alevel_member_entity', function (Blueprint $table) {
//            $table->foreign('id_person')->references('id_person')->on('person');
//            $table->foreign('id_position')->references('id_position')->on('position');
//            $table->foreign('id_direction')->references('id_direction')->on('direction');;
//            $table->foreign('id_company')->references('id_company')->on('it_company');
//        });
//        Schema::table('stack_pivot_table', function (Blueprint $table) {
//            $table->foreign('id_stack')->references('id_stack')->on('stack_of_technologies');
//            $table->foreign('id_company')->references('id_company')->on('it_company');
//        });
//        Schema::table('task', function (Blueprint $table) {
//            $table->foreign('id_member_customer')->references('id_member')->on('alevel_member_entity');
//            $table->foreign('id_member_doer')->references('id_member')->on('alevel_member_entity');
//        });
//        Schema::table('contact_person_entity', function (Blueprint $table) {
//            $table->foreign('id_person')->references('id_person')->on('person');
//            $table->foreign('id_position')->references('id_position')->on('position');
//            $table->foreign('id_direction')->references('id_direction')->on('direction');
//            $table->foreign('id_company')->references('id_company')->on('it_company');
//        });
//        Schema::table('group', function (Blueprint $table) {
//            $table->foreign('id_direction')->references('id_direction')->on('direction');
//        });
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
