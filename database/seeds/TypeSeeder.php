<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Ornate Horned Frog', 
            'Indian Bullfrog', 
            'Purple Frog',
            'Tomato Frog',
            'Fire-bellied Toad'
        ];

        foreach($types as $type) {
            DB::table('types')->insert([
	            'name' =>  $type,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
	        ]);
        }
    }
}
