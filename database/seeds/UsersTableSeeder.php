<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create();
        DB::table('users')->insert(
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => bcrypt('12341234'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
