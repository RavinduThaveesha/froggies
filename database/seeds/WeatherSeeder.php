<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = 10;
        foreach(range(1,10) as $index) {
            DB::table('weather')->insert([
                'around_temperature' =>  rand(25,30),
                'water_temperature' => rand(25,30),
                'humidity' => rand(60,70),
                'water_ph' => rand (7*10, 8*10) / 10,
                'created_at' => Carbon::now()->subDays($days)->format('Y-m-d H:i:s')
            ]);
            
            $days--;
        }
    }
}
