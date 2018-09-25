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
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('persons');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('member_id')->references('id')->on('alevel_members');
            $table->foreign('company_id')->references('id')->on('it_companies');
            $table->foreign('position_id')->references('id')->on('positions');
        });
        Schema::table('skill_groups', function (Blueprint $table) {
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->foreign('person_id')->references('id')->on('persons');
        });
        Schema::table('alevel_members', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('direction_id')->references('id')->on('directions');;
            $table->foreign('company_id')->references('id')->on('it_companies');
        });
        Schema::table('stack_groups', function (Blueprint $table) {
            $table->foreign('stack_id')->references('id')->on('stacks');
            $table->foreign('company_id')->references('id')->on('it_companies');
        });
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('user_id_customer')->references('id')->on('users');
            $table->foreign('user_id_doer')->references('id')->on('users');
        });
        Schema::table('contact_persons', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->foreign('company_id')->references('id')->on('it_companies');
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('direction_id')->references('id')->on('directions');
        });
        Schema::table('employment_students', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('company_id')->references('id')->on('it_companies');
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
