<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class OtQuestionHasOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
                for($i = 1; $i <= 50; $i++){
                    DB::table('ot_question_has_options')->insert([
                        'question_id' => $faker->unique(true)->numberBetween(1,50),
                        'option_id' => $faker->unique(true)->numberBetween(1,50),
                        'check_if_true' => 0
                    ]); 
                }
    }
}
