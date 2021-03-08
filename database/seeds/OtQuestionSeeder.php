<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class OtQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new App\Providers\OnlineTestFakerServiceProvider($faker));
               
                for($i = 1; $i <= 50; $i++){
                    DB::table('ot_questions')->insert([
                        'id' => $i,
                        'packet_id' => $faker->unique(true)->numberBetween(1,2),
                        'section_id' => $faker->unique(true)->numberBetween(1,2),
                        'question' => $faker->question,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]); 
                }
    }
}
