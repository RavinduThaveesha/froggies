<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>  'Admin',
            'email' => 'admin@frogmanager.com',
            'password' => bcrypt(123456789),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
