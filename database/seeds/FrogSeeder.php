<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FrogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $index) {
            DB::table('frogs')->insert([
                'name' =>  'FR-' . $index,
                'gender' => $index % 2 ? 1 : 2,
                'type_id' => rand(1,4),
                'dob' => Carbon::now()->subYear(1)->format('Y-m-d'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
	        ]);
        }
    }
}
