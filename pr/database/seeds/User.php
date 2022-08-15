<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '09120000000',
            'status' => 1,
            'is_admin' => 1,
            'type_identity' => "Admin",
        ]);
    }
}
