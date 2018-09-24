<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gnawer = ['hare', 'rabbit', 'squirrel', 'mole', 'rat', 'mouse'];
        foreach ($gnawer as $value){
            DB::table('persons')->insert([
                'name' => $value,
                'address' => 'gnawer_'.str_random(7),
            ]);
        }
        $fowl = ['hen', 'chicken', 'duck', 'goose', 'turkey'];
        foreach ($fowl as $value){
            DB::table('persons')->insert([
                'name' => $value,
                'address' => 'fowl_'.str_random(7),
            ]);
        }
        $bird = ['falcon', 'eagle', 'jay', 'dove', 'hawk', 'sparrow'];
        foreach ($bird as $value){
            DB::table('persons')->insert([
                'name' => $value,
                'address' => 'bird_'.str_random(7),
            ]);
        }
        $predator = ['wolf', 'fox', 'tiger', 'lion', 'puma', 'bear'];
        foreach ($predator as $value){
            DB::table('persons')->insert([
                'name' => $value,
                'address' => 'predator_'.str_random(7),
            ]);
        }
        $fish = ['shark', 'luke', 'carp', 'chechen', 'clown fish', 'golden fish'];
        foreach ($fish as $value){
            DB::table('persons')->insert([
                'name' => $value,
                'address' => 'fish_'.str_random(7),
            ]);
        }
    }
}
