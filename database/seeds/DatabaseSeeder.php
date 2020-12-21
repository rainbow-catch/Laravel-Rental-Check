<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'first_name' => "admin",
            'last_name' => "admin",
            'gender' => "male",
            'phone' => "123456789",
            'address' => "admin's address",
            'email' => "admin@gmail.com",
            'password' => bcrypt('asdfasdf'),
            'avatar' => 'girl-1.png',
            'about' => "hello from the other world",
            'role' => 'admin',
            'super_admin' => true,
            'status' => "completed",
            'remember_token' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        factory(User::class, 10)->create();
    }
}
