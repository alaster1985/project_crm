<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PersonTableSeeder::class);
        $this->call(SkillTableSeeder::class);
        $this->call(DirectionTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(StackOfTechnologiesTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(ContactInfoTableSeeder::class);
        $this->call(SkillPivotTableTableSeeder::class);
        $this->call(ITCompanyTableSeeder::class);
        $this->call(ContactPersonEntityTableSeeder::class);
        $this->call(StackPivotTableTableSeeder::class);
        $this->call(ALevelMemberEntityTableSeeder::class);
        $this->call(StudentEntityTableSeeder::class);
        $this->call(TaskTableSeeder::class);
        $this->call(EmpolymentStudentSeeder::class);
    }
}
