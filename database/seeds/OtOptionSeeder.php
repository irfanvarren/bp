<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker ;
use Carbon\Carbon;

class OtOptionSeeder extends Seeder
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
            DB::table('ot_options')->insert([
                'id' => $i,
                'question_id' => $faker->unique(true)->numberBetween(1,50),
                'option' => $faker->option,
                'check_if_correct' => $faker->unique(true)->numberBetween(0,1),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]); 
        }
    }
}
