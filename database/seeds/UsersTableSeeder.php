<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
          'name' => 'Roy',
          'email' => 'ahmadirayyan@gmail.com',
          'password' => bcrypt('roy123'),
          'status' => true
        ]);
    }
}
